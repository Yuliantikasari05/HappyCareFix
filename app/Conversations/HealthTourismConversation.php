<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use App\Models\BotQuestion;
use App\Models\BotConversation;
use Illuminate\Support\Facades\Auth;

class HealthTourismConversation extends Conversation
{
    /**
     * Memulai percakapan.
     */
    public function run()
    {
        $this->askCategory();
    }

    /**
     * Menanyakan kategori health tourism.
     */
    public function askCategory()
    {
        $categories = BotQuestion::select('category')->distinct()->pluck('category')->toArray();
        
        $welcomeMessage = Auth::check() 
            ? "Halo " . Auth::user()->name . "! Silakan pilih kategori health tourism yang ingin Anda ketahui:"
            : "Silakan pilih kategori health tourism yang ingin Anda ketahui:";
        
        $question = Question::create($welcomeMessage)
            ->fallback('Maaf, tidak dapat memproses pilihan Anda')
            ->callbackId('ask_category');
        
        foreach ($categories as $category) {
            $question->addButton(Button::create($category)->value($category));
        }
        
        // Tambahkan tombol khusus untuk user yang sudah login
        if (Auth::check()) {
            $question->addButton(Button::create('Rekomendasi Personal')->value('personal'));
            $question->addButton(Button::create('Riwayat Saya')->value('history'));
        }
        
        $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                $value = $answer->getValue();
                
                if ($value === 'personal') {
                    $this->showPersonalRecommendations();
                } elseif ($value === 'history') {
                    $this->showUserHistory();
                } else {
                    $this->showQuestionsByCategory($value);
                }
            } else {
                $this->say('Maaf, silakan pilih dari kategori yang tersedia.');
                $this->askCategory();
            }
        });
    }

    /**
     * Menampilkan rekomendasi personal untuk user yang sudah login.
     */
    public function showPersonalRecommendations()
    {
        if (!Auth::check()) {
            $this->say('Anda harus login untuk melihat rekomendasi personal.');
            $this->askCategory();
            return;
        }

        $user = Auth::user();
        $totalConsultations = BotConversation::where('user_id', $user->id)->count();
        
        $recommendations = [
            "Berdasarkan profil Anda, {$user->name}, berikut rekomendasi personal:",
            "• Bumrungrad Hospital, Bangkok - untuk check-up komprehensif",
            "• Mount Elizabeth Hospital, Singapura - untuk perawatan jantung",
            "• KPJ Healthcare, Malaysia - untuk program wellness",
            "",
            "Total konsultasi Anda: {$totalConsultations}",
            "Rekomendasi: Lakukan check-up rutin setiap 6 bulan"
        ];
        
        foreach ($recommendations as $rec) {
            $this->say($rec);
        }
        
        $this->askForMoreQuestions();
    }

    /**
     * Menampilkan riwayat user.
     */
    public function showUserHistory()
    {
        if (!Auth::check()) {
            $this->say('Anda harus login untuk melihat riwayat konsultasi.');
            $this->askCategory();
            return;
        }

        $conversations = BotConversation::with('question')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        if ($conversations->count() > 0) {
            $this->say("**Riwayat Konsultasi Anda:**");
            foreach ($conversations as $conv) {
                $this->say("• {$conv->question->question} ({$conv->created_at->format('d/m/Y H:i')})");
            }
        } else {
            $this->say("Anda belum memiliki riwayat konsultasi.");
        }
        
        $this->askForMoreQuestions();
    }

    /**
     * Menampilkan pertanyaan berdasarkan kategori.
     */
    public function showQuestionsByCategory($category)
    {
        $questions = BotQuestion::where('category', $category)->get();
        
        if ($questions->isEmpty()) {
            $this->say("Maaf, tidak ada pertanyaan untuk kategori {$category}.");
            $this->askCategory();
            return;
        }
        
        $question = Question::create("Berikut pertanyaan tentang **{$category}**:")
            ->fallback('Maaf, tidak dapat memproses pilihan Anda')
            ->callbackId('ask_question');
        
        foreach ($questions as $q) {
            $question->addButton(Button::create($q->question)->value($q->id));
        }
        
        $question->addButton(Button::create('🔙 Kembali ke kategori')->value('back'));
        
        $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                $value = $answer->getValue();
                
                if ($value === 'back') {
                    $this->askCategory();
                    return;
                }
                
                $questionId = $value;
                $this->showAnswer($questionId);
            } else {
                $this->say('Maaf, silakan pilih dari pertanyaan yang tersedia.');
                $this->askCategory();
            }
        });
    }

    /**
     * Menampilkan jawaban untuk pertanyaan yang dipilih.
     */
    public function showAnswer($questionId)
    {
        $question = BotQuestion::find($questionId);
        
        if ($question) {
            $this->say("**{$question->question}**");
            $this->say($question->answer);
            
            // Simpan percakapan ke database jika user sudah login
            if (Auth::check()) {
                BotConversation::create([
                    'user_id' => Auth::id(),
                    'question_id' => $questionId,
                    'message' => $question->question,
                    'response' => $question->answer
                ]);
                
                $this->say("✅ *Percakapan ini telah disimpan ke riwayat Anda.*");
            }
            
            // Tanya apakah ingin pertanyaan lain
            $this->askForMoreQuestions();
        } else {
            $this->say('Maaf, pertanyaan tidak ditemukan.');
            $this->askCategory();
        }
    }

    /**
     * Menanyakan apakah pengguna ingin pertanyaan lain.
     */
    public function askForMoreQuestions()
    {
        $question = Question::create('Apakah Anda ingin menanyakan hal lain?')
            ->fallback('Maaf, tidak dapat memproses pilihan Anda')
            ->callbackId('ask_more');
            
        $question->addButtons([
            Button::create('✅ Ya, lanjutkan')->value('yes'),
            Button::create('❌ Tidak, selesai')->value('no'),
        ]);
        
        // Tambahkan opsi khusus untuk user yang sudah login
        if (Auth::check()) {
            $question->addButton(Button::create('👤 Lihat Profil')->value('profile'));
        }
        
        $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                $value = $answer->getValue();
                
                if ($value === 'yes') {
                    $this->askCategory();
                } elseif ($value === 'profile') {
                    $this->showUserProfile();
                } else {
                    $thankYouMessage = Auth::check() 
                        ? "Terima kasih " . Auth::user()->name . " telah menggunakan HappyCare chatbot. Semoga informasi yang diberikan bermanfaat! 🏥✨"
                        : "Terima kasih telah menggunakan HappyCare chatbot. Semoga informasi yang diberikan bermanfaat! 🏥✨";
                    
                    $this->say($thankYouMessage);
                }
            } else {
                $this->say('Terima kasih telah menggunakan HappyCare chatbot. Semoga informasi yang diberikan bermanfaat! 🏥✨');
            }
        });
    }

    /**
     * Menampilkan profil user.
     */
    // public function showUserProfile()
    // {
    //     if (!Auth::check()) {
    //         $this->say('Anda harus login untuk melihat profil.');
    //         $this->askCategory();
    //         return;
    //     }

    //     $user = Auth::user();
    //     $totalConsultations = BotConversation::where('user_id', $user->id)->count();
    //     $healthScore = rand(75, 95); // Simulasi health score
        
    //     $profileInfo = [
    //         "**👤 PROFIL ANDA**",
    //         "Nama: {$user->name}",
    //         "Email: {$user->email}",
    //         "Member sejak: " . $user->created_at->format('Y'),
    //         "Total Konsultasi: {$totalConsultations}",
    //         "Health Score: {$healthScore}%",
    //         "",
    //         "🏥 **Status Kesehatan:** Baik",
    //         "📅 **Next Check-up:** 15 April 2024",
    //         "💡 **Rekomendasi:** Lanjutkan pola hidup sehat"
    //     ];
        
    //     foreach ($profileInfo as $info) {
    //         $this->say($info);
    //     }
        
    //     $this->askForMoreQuestions();
    // }
}
