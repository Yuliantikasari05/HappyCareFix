<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BotQuestion;

class BotQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'question' => 'Apa itu HappyCare?',
                'answer' => 'HappyCare adalah platform digital yang menyediakan informasi lengkap tentang layanan kesehatan dan wisata yang ada di Daerah Istimewa Yogyakarta. HappyCare membantu masyarakat menemukan rumah sakit, klinik spesialis, layanan darurat 24 jam, ambulans, serta rekomendasi wisata kuliner, alam, dan keluarga.',
                'category' => 'umum'
            ],
            [
                'question' => 'Jenis layanan kesehatan apa saja yang tersedia di HappyCare?',
                'answer' => 'HappyCare menyediakan informasi tentang berbagai layanan kesehatan, termasuk rumah sakit umum, klinik spesialis, layanan emergency 24 jam, dan layanan ambulans yang tersebar di Daerah Istimewa Yogyakarta.',
                'category' => 'layanan kesehatan'
            ],
            [
                'question' => 'Apakah HappyCare menyediakan informasi tentang rumah sakit di Yogyakarta?',
                'answer' => 'Ya, HappyCare menyediakan data lengkap tentang rumah sakit umum dan klinik spesialis di seluruh wilayah Daerah Istimewa Yogyakarta, lengkap dengan alamat, jam operasional, dan layanan yang disediakan.',
                'category' => 'layanan kesehatan'
            ],
            [
                'question' => 'Layanan darurat apa saja yang dapat ditemukan melalui HappyCare?',
                'answer' => 'HappyCare memberikan informasi tentang layanan emergency 24 jam dan ketersediaan layanan ambulans di Yogyakarta, sehingga pengguna dapat mengakses pertolongan medis dengan cepat saat keadaan darurat.',
                'category' => 'layanan kesehatan'
            ],
            [
                'question' => 'Apakah HappyCare juga menawarkan informasi wisata di Yogyakarta?',
                'answer' => 'Ya, selain layanan kesehatan, HappyCare juga menyajikan informasi wisata di Yogyakarta, seperti wisata kuliner khas, wisata alam yang menenangkan, serta destinasi wisata keluarga yang aman dan menarik.',
                'category' => 'wisata'
            ],
            [
                'question' => 'Kategori wisata apa saja yang tersedia di HappyCare?',
                'answer' => 'Kategori wisata di HappyCare meliputi wisata kuliner yang menawarkan makanan khas Yogyakarta, wisata alam seperti pegunungan dan pantai, serta wisata keluarga yang ramah anak dan cocok untuk liburan bersama keluarga.',
                'category' => 'wisata'
            ],
            [
                'question' => 'Apakah HappyCare cocok untuk wisatawan dan pasien sekaligus?',
                'answer' => 'Ya, HappyCare menggabungkan informasi layanan kesehatan dan wisata dalam satu platform, sehingga cocok untuk wisatawan medis (health tourists) yang ingin menjalani perawatan sambil menikmati keindahan Yogyakarta.',
                'category' => 'umum'
            ],
            [
                'question' => 'Apa saja contoh rumah sakit umum yang tersedia di Yogyakarta melalui HappyCare?',
                'answer' => 'Beberapa rumah sakit umum yang dapat ditemukan di HappyCare antara lain RSUP Dr. Sardjito, RSUD Kota Yogyakarta, dan RSUD Wates. Rumah sakit-rumah sakit ini menyediakan layanan medis umum dengan fasilitas lengkap.',
                'category' => 'layanan kesehatan'
            ],
            [
                'question' => 'Apa saja contoh klinik spesialis yang direkomendasikan di HappyCare?',
                'answer' => 'Klinik spesialis yang tersedia di HappyCare mencakup Klinik Mata Dr. Yap, Klinik Gigi R+ Dental, dan Klinik Spesialis Siloam. Masing-masing memiliki layanan unggulan di bidang kesehatan tertentu.',
                'category' => 'layanan kesehatan'
            ],
            [
                'question' => 'Di mana saya bisa menemukan layanan emergency 24 jam di Yogyakarta?',
                'answer' => 'HappyCare memberikan informasi tentang layanan gawat darurat 24 jam seperti IGD RS Bethesda, IGD RS Panti Rapih, dan IGD RSUD Sleman. Lokasi dan kontak darurat disediakan untuk memudahkan akses saat situasi mendesak.',
                'category' => 'layanan kesehatan'
            ],
            [
                'question' => 'Di mana saya bisa memesan layanan ambulans di Yogyakarta melalui HappyCare?',
                'answer' => 'HappyCare menyajikan informasi pemesanan layanan ambulans dari instansi seperti PMI DIY, RSUD Kota Yogyakarta, dan layanan ambulans swasta seperti Yogyakarta Ambulance Service.',
                'category' => 'layanan kesehatan'
            ],
            [
                'question' => 'Apa saja tempat wisata kuliner yang direkomendasikan di HappyCare?',
                'answer' => 'HappyCare merekomendasikan tempat kuliner populer seperti Gudeg Yu Djum, Sate Klathak Pak Pong, dan Bakmi Jawa Mbah Gito. Tempat-tempat ini menjadi favorit wisatawan dan warga lokal.',
                'category' => 'wisata'
            ],
            [
                'question' => 'Apa saja contoh wisata alam yang bisa ditemukan di HappyCare?',
                'answer' => 'Wisata alam yang terdaftar di HappyCare meliputi Tebing Breksi, Kalibiru, dan Pantai Parangtritis. Destinasi ini cocok untuk relaksasi maupun aktivitas outdoor di Yogyakarta.',
                'category' => 'wisata'
            ],
            [
                'question' => 'Tempat wisata keluarga apa saja yang tersedia di HappyCare?',
                'answer' => 'Wisata keluarga yang direkomendasikan di HappyCare antara lain Gembira Loka Zoo, Taman Pintar Yogyakarta, dan Sindu Kusuma Edupark. Tempat-tempat ini aman dan menyenangkan untuk liburan bersama anak-anak.',
                'category' => 'wisata'
            ]
        ];

        foreach ($questions as $question) {
            BotQuestion::create($question);
        }
    }
}