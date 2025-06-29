<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BotQuestion;
use App\Models\BotConversation;
use Illuminate\Support\Facades\Auth;

class ChatbotController extends Controller
{
    /**
     * Get chatbot categories
     */
    public function getCategories()
    {
        $categories = BotQuestion::select('category')
            ->distinct()
            ->pluck('category')
            ->map(function($category) {
                return [
                    'id' => $category,
                    'name' => ucfirst($category),
                    'icon' => $this->getCategoryIcon($category)
                ];
            });

        return response()->json([
            'categories' => $categories,
            'welcome_message' => Auth::check() 
                ? "Halo " . Auth::user()->name . "! Saya HappyCare Assistant. Silakan pilih kategori yang ingin Anda ketahui:"
                : "Halo! Saya HappyCare Assistant. Silakan pilih kategori yang ingin Anda ketahui:"
        ]);
    }

    /**
     * Get questions by category
     */
    public function getQuestionsByCategory(Request $request)
    {
        $category = $request->get('category');
        
        $questions = BotQuestion::where('category', $category)
            ->select('id', 'question')
            ->get()
            ->map(function($question) {
                return [
                    'id' => $question->id,
                    'text' => $question->question
                ];
            });

        return response()->json([
            'questions' => $questions,
            'category_name' => ucfirst($category)
        ]);
    }

    /**
     * Get answer for specific question
     */
    public function getAnswer(Request $request)
    {
        $questionId = $request->get('question_id');
        $question = BotQuestion::find($questionId);

        if (!$question) {
            return response()->json([
                'error' => 'Pertanyaan tidak ditemukan'
            ], 404);
        }

        // Save conversation if user is logged in
        if (Auth::check()) {
            BotConversation::create([
                'user_id' => Auth::id(),
                'question_id' => $questionId,
                'message' => $question->question,
                'response' => $question->answer
            ]);
        }

        return response()->json([
            'question' => $question->question,
            'answer' => $question->answer,
            'category' => $question->category
        ]);
    }

    /**
     * Get user conversation history
     */
    public function getHistory()
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $conversations = BotConversation::with('question')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get()
            ->map(function($conv) {
                return [
                    'id' => $conv->id,
                    'question' => $conv->question->question ?? $conv->message,
                    'answer' => $conv->response,
                    'category' => $conv->question->category ?? 'umum',
                    'date' => $conv->created_at->format('d/m/Y H:i')
                ];
            });

        return response()->json([
            'conversations' => $conversations,
            'total' => $conversations->count()
        ]);
    }

    /**
     * Enhanced Search with Smart Response Detection
     */
    public function search(Request $request)
    {
        $query = $request->get('query');
        
        if (strlen($query) < 2) {
            return response()->json([
                'results' => [],
                'message' => 'Masukkan minimal 2 karakter untuk pencarian'
            ]);
        }

        // Check for smart responses first
        $smartResponse = $this->getSmartResponse($query);
        
        if ($smartResponse) {
            // Save smart conversation if user is logged in
            if (Auth::check()) {
                BotConversation::create([
                    'user_id' => Auth::id(),
                    'question_id' => null,
                    'message' => $query,
                    'response' => $smartResponse['answer']
                ]);
            }

            return response()->json([
                'smart_response' => $smartResponse,
                'query' => $query,
                'type' => 'smart'
            ]);
        }

        // Fallback to regular question search
        $questions = BotQuestion::where('question', 'LIKE', "%{$query}%")
            ->orWhere('answer', 'LIKE', "%{$query}%")
            ->select('id', 'question', 'category')
            ->limit(5)
            ->get()
            ->map(function($question) {
                return [
                    'id' => $question->id,
                    'text' => $question->question,
                    'category' => $question->category
                ];
            });

        return response()->json([
            'results' => $questions,
            'query' => $query,
            'type' => 'regular'
        ]);
    }

    /**
     * Smart Response Generator
     */
    private function getSmartResponse($query)
    {
        $query = strtolower($query);
        
        // Hospital keywords
        $hospitalKeywords = ['rumah sakit', 'rs', 'hospital', 'klinik', 'dokter', 'medis', 'kesehatan', 'berobat', 'rawat'];
        
        // Tourism keywords  
        $tourismKeywords = ['wisata', 'tour', 'tempat wisata', 'destinasi', 'liburan', 'jalan-jalan', 'rekreasi', 'berlibur', 'piknik'];
        
        // Emergency keywords
        $emergencyKeywords = ['darurat', 'emergency', 'ambulan', 'ugd', 'igd', 'bantuan', 'tolong'];

        // Check for hospital-related queries
        foreach ($hospitalKeywords as $keyword) {
            if (strpos($query, $keyword) !== false) {
                return $this->getHospitalResponse($query);
            }
        }

        // Check for tourism-related queries
        foreach ($tourismKeywords as $keyword) {
            if (strpos($query, $keyword) !== false) {
                return $this->getTourismResponse($query);
            }
        }

        // Check for emergency-related queries
        foreach ($emergencyKeywords as $keyword) {
            if (strpos($query, $keyword) !== false) {
                return $this->getEmergencyResponse();
            }
        }

        return null;
    }

    /**
     * Hospital Response
     */
    private function getHospitalResponse($query)
    {
        $hospitals = [
            [
                'id' => 1,
                'name' => 'RSUP Dr. Sardjito',
                'address' => 'Jl. Kesehatan No.1, Sekip, Sinduadi, Mlati, Sleman',
                'phone' => '(0274) 587333',
                'type' => 'Rumah Sakit Umum Pusat',
                'rating' => 4.2,
                'services' => ['IGD 24 Jam', 'Poliklinik Spesialis', 'Rawat Inap', 'ICU']
            ],
            [
                'id' => 2,
                'name' => 'RS Bethesda Yogyakarta',
                'address' => 'Jl. Jend. Sudirman No.70, Kotabaru, Gondokusuman',
                'phone' => '(0274) 566333',
                'type' => 'Rumah Sakit Umum',
                'rating' => 4.1,
                'services' => ['IGD 24 Jam', 'Medical Check Up', 'Laboratorium', 'Radiologi']
            ],
            [
                'id' => 3,
                'name' => 'RS PKU Muhammadiyah Yogyakarta',
                'address' => 'Jl. KH. Ahmad Dahlan No.20, Ngampilan',
                'phone' => '(0274) 512653',
                'type' => 'Rumah Sakit Umum',
                'rating' => 4.0,
                'services' => ['IGD', 'Poliklinik', 'Rawat Inap', 'Farmasi']
            ],
            [
                'id' => 4,
                'name' => 'RS Panti Rapih',
                'address' => 'Jl. Cik Di Tiro No.30, Terban, Gondokusuman',
                'phone' => '(0274) 563333',
                'type' => 'Rumah Sakit Umum',
                'rating' => 4.3,
                'services' => ['IGD 24 Jam', 'Cardiac Center', 'Cancer Center', 'Stroke Center']
            ],
            [
                'id' => 5,
                'name' => 'RS Ludira Husada Tama',
                'address' => 'Jl. Wirosaban Barat No.4, Sorosutan, Umbulharjo',
                'phone' => '(0274) 371717',
                'type' => 'Rumah Sakit Umum',
                'rating' => 3.9,
                'services' => ['IGD', 'Poliklinik Umum', 'Rawat Inap', 'Persalinan']
            ]
        ];

        $answer = "🏥 **DAFTAR RUMAH SAKIT DI YOGYAKARTA**\n\n";
        
        foreach ($hospitals as $index => $hospital) {
            $answer .= "**" . ($index + 1) . ". " . $hospital['name'] . "**\n";
            $answer .= "📍 " . $hospital['address'] . "\n";
            $answer .= "📞 " . $hospital['phone'] . "\n";
            $answer .= "🏥 " . $hospital['type'] . "\n";
            $answer .= "⭐ " . $hospital['rating'] . "/5\n";
            $answer .= "🔹 Layanan: " . implode(', ', $hospital['services']) . "\n\n";
        }

        $answer .= "💡 **Tips:**\n";
        $answer .= "• Hubungi terlebih dahulu untuk memastikan ketersediaan\n";
        $answer .= "• Bawa kartu identitas dan BPJS/asuransi\n";
        $answer .= "• Untuk emergency, langsung ke IGD atau hubungi 118";

        return [
            'question' => $query,
            'answer' => $answer,
            'category' => 'rumah sakit',
            'data' => $hospitals,
            'type' => 'hospital_list'
        ];
    }

    /**
     * Tourism Response
     */
    private function getTourismResponse($query)
    {
        $tours = [
            [
                'id' => 1,
                'name' => 'Candi Borobudur',
                'location' => 'Magelang (dekat Yogyakarta)',
                'category' => 'Sejarah & Budaya',
                'price' => 'Rp 50.000 - Rp 750.000',
                'rating' => 4.6,
                'description' => 'Candi Buddha terbesar di dunia, warisan UNESCO'
            ],
            [
                'id' => 2,
                'name' => 'Malioboro Street',
                'location' => 'Jl. Malioboro, Yogyakarta',
                'category' => 'Belanja & Kuliner',
                'price' => 'Gratis (belanja sesuai budget)',
                'rating' => 4.4,
                'description' => 'Jalan legendaris untuk belanja dan kuliner khas Jogja'
            ],
            [
                'id' => 3,
                'name' => 'Keraton Yogyakarta',
                'location' => 'Jl. Rotowijayan Blok No.1, Panembahan',
                'category' => 'Sejarah & Budaya',
                'price' => 'Rp 15.000',
                'rating' => 4.3,
                'description' => 'Istana resmi Kesultanan Ngayogyakarta Hadiningrat'
            ],
            [
                'id' => 4,
                'name' => 'Pantai Parangtritis',
                'location' => 'Parangtritis, Kretek, Bantul',
                'category' => 'Alam',
                'price' => 'Rp 3.000',
                'rating' => 4.2,
                'description' => 'Pantai legendaris dengan pemandangan sunset yang indah'
            ],
            [
                'id' => 5,
                'name' => 'Taman Sari',
                'location' => 'Patehan, Kraton, Yogyakarta',
                'category' => 'Sejarah & Budaya',
                'price' => 'Rp 15.000',
                'rating' => 4.1,
                'description' => 'Bekas taman kerajaan dengan arsitektur unik'
            ],
            [
                'id' => 6,
                'name' => 'Goa Jomblang',
                'location' => 'Semanu, Gunungkidul',
                'category' => 'Petualangan',
                'price' => 'Rp 450.000',
                'rating' => 4.5,
                'description' => 'Goa vertikal dengan cahaya surga yang menakjubkan'
            ]
        ];

        $answer = "🏛️ **TEMPAT WISATA POPULER DI YOGYAKARTA**\n\n";
        
        foreach ($tours as $index => $tour) {
            $answer .= "**" . ($index + 1) . ". " . $tour['name'] . "**\n";
            $answer .= "📍 " . $tour['location'] . "\n";
            $answer .= "🏷️ " . $tour['category'] . "\n";
            $answer .= "💰 " . $tour['price'] . "\n";
            $answer .= "⭐ " . $tour['rating'] . "/5\n";
            $answer .= "📝 " . $tour['description'] . "\n\n";
        }

        $answer .= "💡 **Tips Wisata:**\n";
        $answer .= "• Datang pagi hari untuk menghindari keramaian\n";
        $answer .= "• Siapkan kamera untuk foto-foto indah\n";
        $answer .= "• Coba kuliner khas di sekitar lokasi wisata";

        return [
            'question' => $query,
            'answer' => $answer,
            'category' => 'wisata',
            'data' => $tours,
            'type' => 'tour_list'
        ];
    }

    /**
     * Emergency Response
     */
    private function getEmergencyResponse()
    {
        $emergencyContacts = [
            [
                'name' => 'Ambulans Nasional',
                'number' => '118',
                'description' => 'Layanan ambulans 24 jam'
            ],
            [
                'name' => 'Polisi',
                'number' => '110', 
                'description' => 'Kepolisian untuk keamanan dan ketertiban'
            ],
            [
                'name' => 'Pemadam Kebakaran',
                'number' => '113',
                'description' => 'Layanan pemadam kebakaran'
            ],
            [
                'name' => 'SAR (Search and Rescue)',
                'number' => '115',
                'description' => 'Tim pencarian dan penyelamatan'
            ],
            [
                'name' => 'PMI Yogyakarta',
                'number' => '(0274) 377577',
                'description' => 'Palang Merah Indonesia cabang Yogyakarta'
            ],
            [
                'name' => 'RSUP Dr. Sardjito (IGD)',
                'number' => '(0274) 587333',
                'description' => 'Instalasi Gawat Darurat 24 jam'
            ]
        ];

        $answer = "🚨 **NOMOR DARURAT YOGYAKARTA**\n\n";
        
        foreach ($emergencyContacts as $contact) {
            $answer .= "📞 **" . $contact['name'] . "**: " . $contact['number'] . "\n";
            $answer .= "   " . $contact['description'] . "\n\n";
        }
        
        $answer .= "⚠️ **PANDUAN DARURAT:**\n";
        $answer .= "🔴 **Medis**: Hubungi 118 (Ambulans)\n";
        $answer .= "🔴 **Kebakaran**: Hubungi 113\n";
        $answer .= "🔴 **Kriminal**: Hubungi 110 (Polisi)\n\n";
        $answer .= "💡 **Tips**: Tetap tenang, berikan lokasi yang jelas";

        return [
            'question' => 'Nomor darurat',
            'answer' => $answer,
            'category' => 'emergency',
            'data' => $emergencyContacts,
            'type' => 'emergency_list'
        ];
    }

    /**
     * Get category icon
     */
    private function getCategoryIcon($category)
    {
        $icons = [
            'umum' => 'info',
            'layanan kesehatan' => 'heart-pulse',
            'wisata' => 'map-pin',
            'emergency' => 'phone-call',
            'rumah sakit' => 'building-2'
        ];

        return $icons[$category] ?? 'help-circle';
    }
}
