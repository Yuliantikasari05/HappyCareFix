<?php

namespace Database\Seeders;

use App\Models\Hospital;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class HospitalSeeder extends Seeder
{
    public function run() 
    {
        // Hapus data hospital yang sudah ada (opsional)
        // Hospital::truncate();
        
        $hospitals = [
            [
                'name' => 'RSUD Kota Yogyakarta',
                'address' => 'Jl. Wirosaban No. 1, Yogyakarta',
                'phone' => '(0274) 371195',
                'type' => 'general_hospital',
                'description' => 'RSUD Kota Yogyakarta adalah rumah sakit umum daerah yang melayani berbagai kebutuhan kesehatan masyarakat Yogyakarta. Dengan fasilitas lengkap dan tenaga medis profesional, rumah sakit ini berkomitmen memberikan pelayanan kesehatan terbaik untuk semua pasien.',
                'services' => ['Poli Umum', 'Poli Anak', 'Poli Gigi', 'Poli Kandungan', 'Poli Penyakit Dalam', 'IGD 24 Jam', 'Laboratorium', 'Radiologi'],
                'facilities' => ['Rawat Inap', 'Rawat Jalan', 'Farmasi', 'Ambulans', 'Kantin', 'Mushola', 'Parkir Luas'],
                'doctors' => ['dr. Agus Setiawan, Sp.PD', 'dr. Budi Santoso, Sp.A', 'dr. Citra Dewi, Sp.OG'],
                'operating_hours' => 'Senin-Jumat: 07.00-21.00, Sabtu: 07.00-15.00, Minggu: IGD 24 Jam',
                'established_year' => 1965,
                'bed_capacity' => 150,
                'featured' => true,
                'active' => true,
            ],
            [
                'name' => 'RS Dr. Sardjito',
                'address' => 'Jl. Kesehatan No. 1, Sekip, Yogyakarta',
                'phone' => '(0274) 587333',
                'type' => 'general_hospital',
                'description' => 'RS Dr. Sardjito adalah rumah sakit pendidikan yang terafiliasi dengan Fakultas Kedokteran UGM. Sebagai rumah sakit rujukan utama di Yogyakarta, RS Dr. Sardjito dilengkapi dengan teknologi medis terkini dan tenaga medis spesialis yang kompeten.',
                'services' => ['Poli Umum', 'Poli Spesialis', 'Poli Gigi', 'Poli Jantung', 'Poli Saraf', 'IGD 24 Jam', 'Laboratorium', 'Radiologi', 'CT Scan', 'MRI'],
                'facilities' => ['Rawat Inap VIP', 'Rawat Inap Kelas 1-3', 'Rawat Jalan', 'Farmasi', 'Ambulans', 'Kantin', 'Mushola', 'ATM Center', 'Parkir Luas'],
                'doctors' => ['Prof. dr. Darmawan, Sp.JP', 'dr. Eka Putri, Sp.S', 'dr. Fajar Ramadhan, Sp.OT'],
                'operating_hours' => 'Senin-Sabtu: 07.00-21.00, Minggu: IGD 24 Jam',
                'established_year' => 1982,
                'bed_capacity' => 800,
                'featured' => true,
                'active' => true,
            ],
            [
                'name' => 'RS Bethesda Yogyakarta',
                'address' => 'Jl. Jend. Sudirman No. 70, Yogyakarta',
                'phone' => '(0274) 562246',
                'type' => 'general_hospital',
                'description' => 'RS Bethesda Yogyakarta adalah rumah sakit swasta tertua di Yogyakarta yang didirikan oleh misionaris Belanda. Rumah sakit ini menawarkan pelayanan kesehatan komprehensif dengan pendekatan holistik yang memperhatikan aspek fisik, mental, dan spiritual pasien.',
                'services' => ['Poli Umum', 'Poli Spesialis', 'Poli Gigi', 'Poli Jantung', 'Poli Mata', 'IGD 24 Jam', 'Laboratorium', 'Radiologi', 'Hemodialisa'],
                'facilities' => ['Rawat Inap Premium', 'Rawat Inap Kelas 1-3', 'Rawat Jalan', 'Farmasi', 'Ambulans', 'Kantin', 'Kapel', 'ATM Center', 'Parkir Luas'],
                'doctors' => ['dr. Grace Natalia, Sp.M', 'dr. Hendra Wijaya, Sp.JP', 'dr. Irene Kusuma, Sp.KJ'],
                'operating_hours' => 'Senin-Sabtu: 07.00-20.00, Minggu: IGD 24 Jam',
                'established_year' => 1899,
                'bed_capacity' => 324,
                'featured' => true,
                'active' => true,
            ],
            [
                'name' => 'RS Panti Rapih',
                'address' => 'Jl. Cik Ditiro No. 30, Yogyakarta',
                'phone' => '(0274) 563333',
                'type' => 'general_hospital',
                'description' => 'RS Panti Rapih adalah rumah sakit yang dikelola oleh Yayasan Panti Rapih. Dengan moto "Melayani dengan Kasih", rumah sakit ini menyediakan pelayanan kesehatan berkualitas dengan pendekatan yang ramah dan penuh perhatian kepada setiap pasien.',
                'services' => ['Poli Umum', 'Poli Spesialis', 'Poli Gigi', 'Poli Jantung', 'Poli Anak', 'IGD 24 Jam', 'Laboratorium', 'Radiologi', 'Fisioterapi'],
                'facilities' => ['Rawat Inap VIP', 'Rawat Inap Kelas 1-3', 'Rawat Jalan', 'Farmasi', 'Ambulans', 'Kantin', 'Kapel', 'ATM Center', 'Parkir Luas'],
                'doctors' => ['dr. Johannes, Sp.A', 'dr. Kartika Sari, Sp.OG', 'dr. Leo Wibisono, Sp.PD'],
                'operating_hours' => 'Senin-Sabtu: 07.00-21.00, Minggu: IGD 24 Jam',
                'established_year' => 1929,
                'bed_capacity' => 300,
                'featured' => true,
                'active' => true,
            ],
            [
                'name' => 'RS PKU Muhammadiyah Yogyakarta',
                'address' => 'Jl. KHA Dahlan No. 20, Yogyakarta',
                'phone' => '(0274) 512653',
                'type' => 'general_hospital',
                'description' => 'RS PKU Muhammadiyah Yogyakarta adalah rumah sakit Islam yang mengedepankan pelayanan kesehatan berkualitas dengan nilai-nilai Islami. Rumah sakit ini memiliki fasilitas modern dan tenaga medis profesional untuk melayani berbagai kebutuhan kesehatan masyarakat.',
                'services' => ['Poli Umum', 'Poli Spesialis', 'Poli Gigi', 'Poli Jantung', 'Poli Anak', 'IGD 24 Jam', 'Laboratorium', 'Radiologi', 'Hemodialisa'],
                'facilities' => ['Rawat Inap VIP', 'Rawat Inap Kelas 1-3', 'Rawat Jalan', 'Farmasi', 'Ambulans', 'Kantin', 'Mushola', 'ATM Center', 'Parkir Luas'],
                'doctors' => ['dr. Muhammad Arif, Sp.JP', 'dr. Nurul Hidayah, Sp.A', 'dr. Omar Faisal, Sp.OT'],
                'operating_hours' => 'Senin-Sabtu: 07.00-21.00, Minggu: IGD 24 Jam',
                'established_year' => 1923,
                'bed_capacity' => 250,
                'featured' => true,
                'active' => true,
            ],
            [
                'name' => 'RS JIH Yogyakarta',
                'address' => 'Jl. Ring Road Utara No. 160, Sleman',
                'phone' => '(0274) 4463555',
                'type' => 'general_hospital',
                'description' => 'RS JIH Yogyakarta (Jogja International Hospital) adalah rumah sakit modern dengan standar internasional. Dilengkapi dengan teknologi medis terkini dan tenaga medis berpengalaman, RS JIH berkomitmen memberikan pelayanan kesehatan terbaik dengan kenyamanan setara hotel bintang lima.',
                'services' => ['Poli Umum', 'Poli Spesialis', 'Poli Gigi', 'Poli Jantung', 'Poli Kecantikan', 'IGD 24 Jam', 'Laboratorium', 'Radiologi', 'CT Scan', 'MRI'],
                'facilities' => ['Rawat Inap Premium', 'Rawat Inap VIP', 'Rawat Inap Kelas 1-3', 'Rawat Jalan', 'Farmasi', 'Ambulans', 'Kafe', 'Mushola', 'ATM Center', 'Parkir Luas'],
                'doctors' => ['dr. Pramudya Wijaya, Sp.JP', 'dr. Queen Raissa, Sp.KK', 'dr. Raden Bagus, Sp.BS'],
                'operating_hours' => 'Senin-Minggu: 07.00-22.00, IGD 24 Jam',
                'established_year' => 2007,
                'bed_capacity' => 200,
                'featured' => true,
                'active' => true,
            ],
            [
                'name' => 'RS Queen Latifa',
                'address' => 'Jl. Siliwangi No. 118, Gamping, Sleman',
                'phone' => '(0274) 620555',
                'type' => 'general_hospital',
                'description' => 'RS Queen Latifa adalah rumah sakit yang fokus pada pelayanan kesehatan ibu dan anak, namun juga menyediakan layanan kesehatan umum. Dengan lingkungan yang nyaman dan tenaga medis yang ramah, rumah sakit ini menjadi pilihan utama untuk keluarga.',
                'services' => ['Poli Umum', 'Poli Anak', 'Poli Kandungan', 'Poli Gigi', 'IGD 24 Jam', 'Laboratorium', 'Radiologi', 'Persalinan'],
                'facilities' => ['Rawat Inap VIP', 'Rawat Inap Kelas 1-3', 'Rawat Jalan', 'Farmasi', 'Ambulans', 'Kantin', 'Mushola', 'Parkir'],
                'doctors' => ['dr. Siti Aminah, Sp.OG', 'dr. Taufik Rahman, Sp.A', 'dr. Umi Kalsum, Sp.GK'],
                'operating_hours' => 'Senin-Sabtu: 07.00-20.00, Minggu: IGD 24 Jam',
                'established_year' => 2010,
                'bed_capacity' => 120,
                'featured' => false,
                'active' => true,
            ],
            [
                'name' => 'RS Ludira Husada Tama',
                'address' => 'Jl. Wiratama No. 4, Tegalrejo, Yogyakarta',
                'phone' => '(0274) 620333',
                'type' => 'general_hospital',
                'description' => 'RS Ludira Husada Tama adalah rumah sakit yang menyediakan pelayanan kesehatan komprehensif dengan harga terjangkau. Rumah sakit ini berkomitmen untuk memberikan pelayanan kesehatan yang berkualitas untuk semua lapisan masyarakat.',
                'services' => ['Poli Umum', 'Poli Spesialis', 'Poli Gigi', 'IGD 24 Jam', 'Laboratorium', 'Radiologi'],
                'facilities' => ['Rawat Inap Kelas 1-3', 'Rawat Jalan', 'Farmasi', 'Ambulans', 'Kantin', 'Mushola', 'Parkir'],
                'doctors' => ['dr. Vina Muliani, Sp.PD', 'dr. Wahyu Nugroho, Sp.B', 'dr. Xavier Putra, Sp.THT'],
                'operating_hours' => 'Senin-Sabtu: 07.00-20.00, Minggu: IGD 24 Jam',
                'established_year' => 1995,
                'bed_capacity' => 100,
                'featured' => false,
                'active' => true,
            ],
            [
                'name' => 'RS Panti Rini',
                'address' => 'Jl. Solo Km 13.2, Kalasan, Sleman',
                'phone' => '(0274) 497323',
                'type' => 'general_hospital',
                'description' => 'RS Panti Rini adalah rumah sakit yang terletak di kawasan Kalasan, Sleman. Dengan suasana yang tenang dan asri, rumah sakit ini menawarkan pelayanan kesehatan yang nyaman dengan pendekatan kekeluargaan.',
                'services' => ['Poli Umum', 'Poli Anak', 'Poli Gigi', 'Poli Kandungan', 'IGD 24 Jam', 'Laboratorium', 'Radiologi'],
                'facilities' => ['Rawat Inap Kelas 1-3', 'Rawat Jalan', 'Farmasi', 'Ambulans', 'Kantin', 'Kapel', 'Parkir'],
                'doctors' => ['dr. Yohanes Surya, Sp.PD', 'dr. Zainab Fatimah, Sp.A', 'dr. Adi Nugroho, Sp.B'],
                'operating_hours' => 'Senin-Sabtu: 07.00-20.00, Minggu: IGD 24 Jam',
                'established_year' => 1987,
                'bed_capacity' => 90,
                'featured' => false,
                'active' => true,
            ],
            [
                'name' => 'RS PKU Muhammadiyah Kotagede',
                'address' => 'Jl. Ngeksigondo No. 56, Kotagede',
                'phone' => '(0274) 375396',
                'type' => 'general_hospital',
                'description' => 'RS PKU Muhammadiyah Kotagede adalah cabang dari RS PKU Muhammadiyah yang melayani masyarakat di kawasan Kotagede dan sekitarnya. Rumah sakit ini menawarkan pelayanan kesehatan Islami dengan fasilitas yang memadai.',
                'services' => ['Poli Umum', 'Poli Anak', 'Poli Gigi', 'Poli Kandungan', 'IGD 24 Jam', 'Laboratorium', 'Radiologi'],
                'facilities' => ['Rawat Inap Kelas 1-3', 'Rawat Jalan', 'Farmasi', 'Ambulans', 'Kantin', 'Mushola', 'Parkir'],
                'doctors' => ['dr. Bambang Sutrisno, Sp.PD', 'dr. Citra Dewi, Sp.A', 'dr. Dian Puspita, Sp.OG'],
                'operating_hours' => 'Senin-Sabtu: 07.00-20.00, Minggu: IGD 24 Jam',
                'established_year' => 1990,
                'bed_capacity' => 80,
                'featured' => false,
                'active' => true,
            ],
            [
                'name' => 'RSU Rajawali Citra',
                'address' => 'Jl. Rajawali No. 1, Yogyakarta',
                'phone' => '(0274) 4463535',
                'type' => 'general_hospital',
                'description' => 'RSU Rajawali Citra adalah rumah sakit umum yang menyediakan pelayanan kesehatan berkualitas dengan harga terjangkau. Dengan lokasi yang strategis di pusat kota, rumah sakit ini mudah diakses oleh masyarakat Yogyakarta.',
                'services' => ['Poli Umum', 'Poli Anak', 'Poli Gigi', 'Poli Kandungan', 'IGD 24 Jam', 'Laboratorium', 'Radiologi'],
                'facilities' => ['Rawat Inap Kelas 1-3', 'Rawat Jalan', 'Farmasi', 'Ambulans', 'Kantin', 'Mushola', 'Parkir'],
                'doctors' => ['dr. Eko Prasetyo, Sp.PD', 'dr. Fani Wijaya, Sp.A', 'dr. Gunawan Santoso, Sp.B'],
                'operating_hours' => 'Senin-Sabtu: 07.00-20.00, Minggu: IGD 24 Jam',
                'established_year' => 2000,
                'bed_capacity' => 110,
                'featured' => false,
                'active' => true,
            ],
            [
                'name' => 'RS Siloam Yogyakarta',
                'address' => 'Jl. Laksda Adisucipto No. 32-34',
                'phone' => '(0274) 2809000',
                'type' => 'general_hospital',
                'description' => 'RS Siloam Yogyakarta adalah bagian dari jaringan Rumah Sakit Siloam yang tersebar di seluruh Indonesia. Dengan standar pelayanan internasional dan teknologi medis terkini, rumah sakit ini menawarkan pelayanan kesehatan premium di Yogyakarta.',
                'services' => ['Poli Umum', 'Poli Spesialis', 'Poli Gigi', 'Poli Jantung', 'Poli Kecantikan', 'IGD 24 Jam', 'Laboratorium', 'Radiologi', 'CT Scan', 'MRI'],
                'facilities' => ['Rawat Inap Premium', 'Rawat Inap VIP', 'Rawat Inap Kelas 1-3', 'Rawat Jalan', 'Farmasi', 'Ambulans', 'Kafe', 'Mushola', 'ATM Center', 'Parkir Luas'],
                'doctors' => ['dr. Hendra Wijaya, Sp.JP', 'dr. Indah Permata, Sp.KK', 'dr. Joko Widodo, Sp.S'],
                'operating_hours' => 'Senin-Minggu: 07.00-22.00, IGD 24 Jam',
                'established_year' => 2015,
                'bed_capacity' => 180,
                'featured' => true,
                'active' => true,
            ],
            [
                'name' => 'RS Happy Land',
                'address' => 'Jl. Ipda Tut Harsono No. 53',
                'phone' => '(0274) 550060',
                'type' => 'general_hospital',
                'description' => 'RS Happy Land adalah rumah sakit yang fokus pada pelayanan kesehatan anak dan keluarga. Dengan desain interior yang ceria dan ramah anak, rumah sakit ini menciptakan suasana yang menyenangkan untuk pasien anak-anak.',
                'services' => ['Poli Umum', 'Poli Anak', 'Poli Gigi', 'Poli Tumbuh Kembang', 'IGD 24 Jam', 'Laboratorium', 'Radiologi'],
                'facilities' => ['Rawat Inap Kelas 1-3', 'Rawat Jalan', 'Farmasi', 'Ambulans', 'Kantin', 'Taman Bermain', 'Parkir'],
                'doctors' => ['dr. Kartika Sari, Sp.A', 'dr. Lukman Hakim, Sp.A', 'dr. Mira Susanti, Sp.KJ'],
                'operating_hours' => 'Senin-Sabtu: 07.00-20.00, Minggu: IGD 24 Jam',
                'established_year' => 2012,
                'bed_capacity' => 75,
                'featured' => false,
                'active' => true,
            ],
            [
                'name' => 'RS Pratama Sleman',
                'address' => 'Jl. Magelang Km 10, Sleman',
                'phone' => '(0274) 866751',
                'type' => 'general_hospital',
                'description' => 'RS Pratama Sleman adalah rumah sakit pemerintah yang melayani masyarakat di wilayah Sleman. Dengan fokus pada pelayanan kesehatan dasar, rumah sakit ini menjadi ujung tombak pelayanan kesehatan di tingkat kecamatan.',
                'services' => ['Poli Umum', 'Poli Anak', 'Poli Gigi', 'Poli Kandungan', 'IGD 24 Jam', 'Laboratorium', 'Radiologi'],
                'facilities' => ['Rawat Inap Kelas 2-3', 'Rawat Jalan', 'Farmasi', 'Ambulans', 'Kantin', 'Mushola', 'Parkir'],
                'doctors' => ['dr. Nugroho Santoso', 'dr. Olivia Putri', 'dr. Pramudya Wijaya'],
                'operating_hours' => 'Senin-Sabtu: 07.00-14.00, IGD 24 Jam',
                'established_year' => 2005,
                'bed_capacity' => 50,
                'featured' => false,
                'active' => true,
            ],
            [
                'name' => 'RS Nur Hidayah',
                'address' => 'Jl. Imogiri Timur Km. 11, Bantul',
                'phone' => '(0274) 2810380',
                'type' => 'general_hospital',
                'description' => 'RS Nur Hidayah adalah rumah sakit Islam yang melayani masyarakat di wilayah Bantul dan sekitarnya. Dengan pendekatan pelayanan yang Islami, rumah sakit ini menawarkan pelayanan kesehatan yang memperhatikan nilai-nilai spiritual.',
                'services' => ['Poli Umum', 'Poli Anak', 'Poli Gigi', 'Poli Kandungan', 'IGD 24 Jam', 'Laboratorium', 'Radiologi'],
                'facilities' => ['Rawat Inap Kelas 1-3', 'Rawat Jalan', 'Farmasi', 'Ambulans', 'Kantin', 'Mushola', 'Parkir'],
                'doctors' => ['dr. Qomariah Zulfa, Sp.A', 'dr. Rahmat Hidayat, Sp.PD', 'dr. Siti Aminah, Sp.OG'],
                'operating_hours' => 'Senin-Sabtu: 07.00-20.00, Minggu: IGD 24 Jam',
                'established_year' => 2008,
                'bed_capacity' => 85,
                'featured' => false,
                'active' => true,
            ],
            [
                'name' => 'RS Bhayangkara',
                'address' => 'Jl. Raya Solo - Yogyakarta, Sleman',
                'phone' => '(0274) 868437',
                'type' => 'general_hospital',
                'description' => 'RS Bhayangkara adalah rumah sakit yang dikelola oleh Kepolisian Republik Indonesia. Selain melayani anggota kepolisian dan keluarganya, rumah sakit ini juga terbuka untuk masyarakat umum dengan pelayanan kesehatan yang berkualitas.',
                'services' => ['Poli Umum', 'Poli Spesialis', 'Poli Gigi', 'Poli Bedah', 'IGD 24 Jam', 'Laboratorium', 'Radiologi'],
                'facilities' => ['Rawat Inap VIP', 'Rawat Inap Kelas 1-3', 'Rawat Jalan', 'Farmasi', 'Ambulans', 'Kantin', 'Mushola', 'Parkir Luas'],
                'doctors' => ['dr. Taufik Rahman, Sp.B', 'dr. Umi Kalsum, Sp.PD', 'dr. Vina Muliani, Sp.A'],
                'operating_hours' => 'Senin-Sabtu: 07.00-20.00, Minggu: IGD 24 Jam',
                'established_year' => 1975,
                'bed_capacity' => 120,
                'featured' => false,
                'active' => true,
            ],
            [
                'name' => 'RSUD Sleman',
                'address' => 'Jl. Bhayangkara No. 48, Sleman',
                'phone' => '(0274) 868437',
                'type' => 'general_hospital',
                'description' => 'RSUD Sleman adalah rumah sakit umum daerah yang melayani masyarakat di Kabupaten Sleman. Sebagai rumah sakit pemerintah, RSUD Sleman berkomitmen memberikan pelayanan kesehatan yang berkualitas dan terjangkau untuk semua lapisan masyarakat.',
                'services' => ['Poli Umum', 'Poli Spesialis', 'Poli Gigi', 'Poli Jantung', 'Poli Anak', 'IGD 24 Jam', 'Laboratorium', 'Radiologi'],
                'facilities' => ['Rawat Inap VIP', 'Rawat Inap Kelas 1-3', 'Rawat Jalan', 'Farmasi', 'Ambulans', 'Kantin', 'Mushola', 'Parkir Luas'],
                'doctors' => ['dr. Wahyu Nugroho, Sp.JP', 'dr. Xavier Putra, Sp.PD', 'dr. Yohanes Surya, Sp.A'],
                'operating_hours' => 'Senin-Jumat: 07.00-14.00, Sabtu: 07.00-12.00, IGD 24 Jam',
                'established_year' => 1970,
                'bed_capacity' => 200,
                'featured' => true,
                'active' => true,
            ],
            [
                'name' => 'RSU Griya Mahardhika',
                'address' => 'Jl. Veteran No. 101, Umbulharjo, Yogyakarta',
                'phone' => '(0274) 389110',
                'type' => 'general_hospital',
                'description' => 'RSU Griya Mahardhika adalah rumah sakit umum yang menawarkan pelayanan kesehatan komprehensif dengan harga terjangkau. Dengan lokasi yang strategis di kawasan Umbulharjo, rumah sakit ini mudah diakses oleh masyarakat Yogyakarta bagian selatan.',
                'services' => ['Poli Umum', 'Poli Anak', 'Poli Gigi', 'Poli Kandungan', 'IGD 24 Jam', 'Laboratorium', 'Radiologi'],
                'facilities' => ['Rawat Inap Kelas 1-3', 'Rawat Jalan', 'Farmasi', 'Ambulans', 'Kantin', 'Mushola', 'Parkir'],
                'doctors' => ['dr. Zainab Fatimah, Sp.OG', 'dr. Adi Nugroho, Sp.PD', 'dr. Bambang Sutrisno, Sp.B'],
                'operating_hours' => 'Senin-Sabtu: 07.00-20.00, Minggu: IGD 24 Jam',
                'established_year' => 2003,
                'bed_capacity' => 95,
                'featured' => false,
                'active' => true,
            ],
        ];

        foreach ($hospitals as $hospitalData) {
            // Buat slug dari nama
            $slug = Str::slug($hospitalData['name']);
            
            // Cek apakah hospital dengan slug ini sudah ada
            $existingHospital = Hospital::where('slug', $slug)->first();
            
            if (!$existingHospital) {
                Hospital::create([
                    'name' => $hospitalData['name'],
                    'slug' => $slug,
                    'type' => $hospitalData['type'],
                    'description' => $hospitalData['description'],
                    'address' => $hospitalData['address'],
                    'phone' => $hospitalData['phone'],
                    'services' => $hospitalData['services'],
                    'facilities' => $hospitalData['facilities'],
                    'doctors' => $hospitalData['doctors'],
                    'operating_hours' => $hospitalData['operating_hours'],
                    'established_year' => $hospitalData['established_year'],
                    'bed_capacity' => $hospitalData['bed_capacity'],
                    'featured' => $hospitalData['featured'],
                    'active' => $hospitalData['active'],
                ]);
                
                $this->command->info("Created hospital: {$hospitalData['name']}");
            } else {
                $this->command->info("Hospital already exists: {$hospitalData['name']}");
            }
        }
    }
}