<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hospital;

class SpecialistClinicSeeder extends Seeder
{
    public function run()
    {
        $specialistClinics = [
            [
                'name' => 'Klinik Spesialis Gigi dan Mulut UGM',
                'type' => 'specialist_clinic',
                'address' => 'Jl. Denta, Sekip, Yogyakarta',
                'phone' => '(0274) 545673',
                'email' => 'dental@ugm.ac.id',
                'website' => 'https://dental.ugm.ac.id',
                'description' => 'Klinik spesialis gigi dan mulut terkemuka di bawah Universitas Gadjah Mada dengan teknologi dental terdepan dan tenaga medis berpengalaman.',
                'services' => ['Pemeriksaan Gigi', 'Scaling', 'Tambal Gigi', 'Cabut Gigi', 'Orthodonti', 'Implant Gigi', 'Bedah Mulut', 'Prostodonti'],
                'facilities' => ['Ruang Perawatan Modern', 'Dental X-Ray', 'Sterilisasi Canggih', 'Ruang Tunggu Nyaman', 'Parkir Luas'],
                'operating_hours' => [
                    'senin' => '08:00-16:00',
                    'selasa' => '08:00-16:00',
                    'rabu' => '08:00-16:00',
                    'kamis' => '08:00-16:00',
                    'jumat' => '08:00-16:00',
                    'sabtu' => '08:00-12:00',
                    'minggu' => 'Tutup'
                ],
                'emergency_contact' => '(0274) 545673',
                'latitude' => -7.7687,
                'longitude' => 110.3739,
                'featured' => true,
                'active' => true
            ],
            [
                'name' => 'Klinik Spesialis Mata Dr. YAP',
                'type' => 'specialist_clinic',
                'address' => 'Jl. Cik Ditiro No. 5, Yogyakarta',
                'phone' => '(0274) 562054',
                'email' => 'info@klinikmata-yap.com',
                'website' => 'https://klinikmata-yap.com',
                'description' => 'Klinik spesialis mata terkemuka di Yogyakarta dengan teknologi terdepan untuk perawatan mata komprehensif.',
                'services' => ['Pemeriksaan Mata', 'Operasi Katarak', 'Operasi Refraktif', 'Retina', 'Glaukoma', 'Kornea', 'Pediatric Ophthalmology'],
                'facilities' => ['Ruang Operasi Steril', 'Alat Diagnostik Modern', 'OCT Scanner', 'Laser Equipment', 'Recovery Room'],
                'operating_hours' => [
                    'senin' => '08:00-17:00',
                    'selasa' => '08:00-17:00',
                    'rabu' => '08:00-17:00',
                    'kamis' => '08:00-17:00',
                    'jumat' => '08:00-17:00',
                    'sabtu' => '08:00-12:00',
                    'minggu' => 'Tutup'
                ],
                'emergency_contact' => '(0274) 562054',
                'latitude' => -7.7845,
                'longitude' => 110.3740,
                'featured' => true,
                'active' => true
            ],
            [
                'name' => 'Klinik Spesialis THT RSUP Dr. Sardjito',
                'type' => 'specialist_clinic',
                'address' => 'Jl. Kesehatan No. 1, Sekip, Yogyakarta',
                'phone' => '(0274) 587333',
                'email' => 'tht@sardjito.co.id',
                'website' => 'https://sardjito.co.id',
                'description' => 'Klinik spesialis THT (Telinga, Hidung, Tenggorokan) di RSUP Dr. Sardjito dengan pelayanan komprehensif dan teknologi modern.',
                'services' => ['Pemeriksaan THT', 'Audiometri', 'Endoskopi', 'Operasi THT', 'Terapi Wicara', 'Hearing Aid', 'Sleep Study'],
                'facilities' => ['Ruang Endoskopi', 'Audiologi Lab', 'Ruang Operasi', 'Speech Therapy Room', 'Hearing Test Room'],
                'operating_hours' => [
                    'senin' => '08:00-15:00',
                    'selasa' => '08:00-15:00',
                    'rabu' => '08:00-15:00',
                    'kamis' => '08:00-15:00',
                    'jumat' => '08:00-15:00',
                    'sabtu' => '08:00-12:00',
                    'minggu' => 'Tutup'
                ],
                'emergency_contact' => '(0274) 587333',
                'latitude' => -7.7687,
                'longitude' => 110.3739,
                'featured' => false,
                'active' => true
            ],
            [
                'name' => 'Klinik Spesialis Jantung RS Panti Rapih',
                'type' => 'specialist_clinic',
                'address' => 'Jl. Cik Ditiro No. 30, Yogyakarta',
                'phone' => '(0274) 563333',
                'email' => 'jantung@pantirapih.or.id',
                'website' => 'https://pantirapih.or.id',
                'description' => 'Klinik spesialis jantung dengan teknologi kardiovaskular terdepan dan tim dokter spesialis jantung berpengalaman.',
                'services' => ['Konsultasi Jantung', 'Ekokardiografi', 'Stress Test', 'Holter Monitor', 'Kateterisasi', 'Angioplasti', 'Pacemaker'],
                'facilities' => ['Cath Lab', 'Echo Lab', 'Stress Test Lab', 'CCU', 'Cardiac Rehabilitation'],
                'operating_hours' => [
                    'senin' => '08:00-16:00',
                    'selasa' => '08:00-16:00',
                    'rabu' => '08:00-16:00',
                    'kamis' => '08:00-16:00',
                    'jumat' => '08:00-16:00',
                    'sabtu' => '08:00-12:00',
                    'minggu' => 'Tutup'
                ],
                'emergency_contact' => '(0274) 563333',
                'latitude' => -7.7851,
                'longitude' => 110.3742,
                'featured' => true,
                'active' => true
            ],
            [
                'name' => 'Klinik Spesialis Anak RS Bethesda',
                'type' => 'specialist_clinic',
                'address' => 'Jl. Jend. Sudirman No. 70, Yogyakarta',
                'phone' => '(0274) 562246',
                'email' => 'anak@rsbethesda.com',
                'website' => 'https://rsbethesda.com',
                'description' => 'Klinik spesialis anak dengan fasilitas lengkap untuk perawatan kesehatan anak dari bayi hingga remaja.',
                'services' => ['Konsultasi Anak', 'Imunisasi', 'Tumbuh Kembang', 'Gizi Anak', 'Alergi Anak', 'Neonatologi', 'Pediatric Emergency'],
                'facilities' => ['Ruang Perawatan Anak', 'Play Area', 'NICU', 'Ruang Laktasi', 'Child-Friendly Environment'],
                'operating_hours' => [
                    'senin' => '08:00-16:00',
                    'selasa' => '08:00-16:00',
                    'rabu' => '08:00-16:00',
                    'kamis' => '08:00-16:00',
                    'jumat' => '08:00-16:00',
                    'sabtu' => '08:00-12:00',
                    'minggu' => 'Tutup'
                ],
                'emergency_contact' => '(0274) 562246',
                'latitude' => -7.7956,
                'longitude' => 110.3695,
                'featured' => false,
                'active' => true
            ],
            [
                'name' => 'Klinik Spesialis Kulit RSUD Kota Yogyakarta',
                'type' => 'specialist_clinic',
                'address' => 'Jl. Wirosaban No. 1, Yogyakarta',
                'phone' => '(0274) 371195',
                'email' => 'kulit@rsudkota.jogjakota.go.id',
                'website' => 'https://rsudkota.jogjakota.go.id',
                'description' => 'Klinik spesialis kulit dan kelamin dengan pelayanan dermatologi komprehensif dan teknologi terkini.',
                'services' => ['Konsultasi Kulit', 'Dermatologi Estetik', 'Laser Therapy', 'Chemical Peeling', 'Bedah Kulit', 'Venereologi', 'Dermatopathology'],
                'facilities' => ['Laser Room', 'Dermatology Lab', 'Phototherapy Unit', 'Cosmetic Surgery Room', 'Biopsy Room'],
                'operating_hours' => [
                    'senin' => '08:00-15:00',
                    'selasa' => '08:00-15:00',
                    'rabu' => '08:00-15:00',
                    'kamis' => '08:00-15:00',
                    'jumat' => '08:00-15:00',
                    'sabtu' => '08:00-12:00',
                    'minggu' => 'Tutup'
                ],
                'emergency_contact' => '(0274) 371195',
                'latitude' => -7.8025,
                'longitude' => 110.3656,
                'featured' => false,
                'active' => true
            ],
            [
                'name' => 'Klinik Spesialis Bedah RS PKU Muhammadiyah',
                'type' => 'specialist_clinic',
                'address' => 'Jl. KHA Dahlan No. 20, Yogyakarta',
                'phone' => '(0274) 512653',
                'email' => 'bedah@rspku.com',
                'website' => 'https://rspku.com',
                'description' => 'Klinik spesialis bedah dengan berbagai layanan bedah umum dan spesialis dengan teknologi minimal invasive.',
                'services' => ['Bedah Umum', 'Bedah Digestif', 'Bedah Onkologi', 'Bedah Laparoskopi', 'Bedah Trauma', 'Bedah Plastik', 'Bedah Vaskular'],
                'facilities' => ['Ruang Operasi Modern', 'Laparoscopy Equipment', 'Recovery Room', 'Pre-Op Room', 'Surgical ICU'],
                'operating_hours' => [
                    'senin' => '08:00-16:00',
                    'selasa' => '08:00-16:00',
                    'rabu' => '08:00-16:00',
                    'kamis' => '08:00-16:00',
                    'jumat' => '08:00-16:00',
                    'sabtu' => '08:00-12:00',
                    'minggu' => 'Tutup'
                ],
                'emergency_contact' => '(0274) 512653',
                'latitude' => -7.8014,
                'longitude' => 110.3644,
                'featured' => false,
                'active' => true
            ],
            [
                'name' => 'Klinik Spesialis Saraf RS DKT',
                'type' => 'specialist_clinic',
                'address' => 'Jl. Juadi No. 19, Yogyakarta',
                'phone' => '(0274) 555402',
                'email' => 'saraf@rsdkt.co.id',
                'website' => 'https://rsdkt.co.id',
                'description' => 'Klinik spesialis saraf dengan pelayanan neurologi komprehensif dan teknologi diagnostik terdepan.',
                'services' => ['Konsultasi Neurologi', 'EEG', 'EMG', 'Stroke Unit', 'Epilepsi', 'Parkinson', 'Neurosurgery'],
                'facilities' => ['Neuro Lab', 'EEG Room', 'EMG Room', 'Stroke Unit', 'Neurosurgery OR'],
                'operating_hours' => [
                    'senin' => '08:00-16:00',
                    'selasa' => '08:00-16:00',
                    'rabu' => '08:00-16:00',
                    'kamis' => '08:00-16:00',
                    'jumat' => '08:00-16:00',
                    'sabtu' => '08:00-12:00',
                    'minggu' => 'Tutup'
                ],
                'emergency_contact' => '(0274) 555402',
                'latitude' => -7.7923,
                'longitude' => 110.3712,
                'featured' => false,
                'active' => true
            ],
            [
                'name' => 'Klinik Spesialis Paru RSUD Sleman',
                'type' => 'specialist_clinic',
                'address' => 'Jl. Bhayangkara No. 48, Sleman',
                'phone' => '(0274) 868437',
                'email' => 'paru@rsud.slemankab.go.id',
                'website' => 'https://rsud.slemankab.go.id',
                'description' => 'Klinik spesialis paru dengan pelayanan pulmonologi lengkap dan fasilitas diagnostik respirasi modern.',
                'services' => ['Konsultasi Paru', 'Spirometri', 'Bronkoskopi', 'TB Treatment', 'Asma', 'PPOK', 'Sleep Apnea'],
                'facilities' => ['Pulmonary Function Lab', 'Bronchoscopy Room', 'Sleep Study Lab', 'Respiratory ICU', 'TB Isolation'],
                'operating_hours' => [
                    'senin' => '08:00-15:00',
                    'selasa' => '08:00-15:00',
                    'rabu' => '08:00-15:00',
                    'kamis' => '08:00-15:00',
                    'jumat' => '08:00-15:00',
                    'sabtu' => '08:00-12:00',
                    'minggu' => 'Tutup'
                ],
                'emergency_contact' => '(0274) 868437',
                'latitude' => -7.7456,
                'longitude' => 110.3542,
                'featured' => false,
                'active' => true
            ],
            [
                'name' => 'Klinik Spesialis Orthopedi RS Happy Land',
                'type' => 'specialist_clinic',
                'address' => 'Jl. Ipda Tut Harsono No. 53, Yogyakarta',
                'phone' => '(0274) 550060',
                'email' => 'ortho@rshappyland.com',
                'website' => 'https://rshappyland.com',
                'description' => 'Klinik spesialis orthopedi dengan layanan tulang dan sendi komprehensif serta teknologi bedah minimal invasive.',
                'services' => ['Konsultasi Orthopedi', 'Arthroscopy', 'Joint Replacement', 'Spine Surgery', 'Sports Medicine', 'Trauma Orthopedi', 'Pediatric Orthopedi'],
                'facilities' => ['Arthroscopy Suite', 'Digital X-Ray', 'MRI', 'Physical Therapy', 'Sports Medicine Center'],
                'operating_hours' => [
                    'senin' => '08:00-17:00',
                    'selasa' => '08:00-17:00',
                    'rabu' => '08:00-17:00',
                    'kamis' => '08:00-17:00',
                    'jumat' => '08:00-17:00',
                    'sabtu' => '08:00-12:00',
                    'minggu' => 'Tutup'
                ],
                'emergency_contact' => '(0274) 550060',
                'latitude' => -7.8156,
                'longitude' => 110.3889,
                'featured' => false,
                'active' => true
            ],
            [
                'name' => 'Klinik Spesialis Mata Siloam',
                'type' => 'specialist_clinic',
                'address' => 'Jl. Laksda Adisucipto No. 32, Yogyakarta',
                'phone' => '(0274) 2809000',
                'email' => 'mata@siloamhospitals.com',
                'website' => 'https://siloamhospitals.com',
                'description' => 'Klinik spesialis mata dengan teknologi terdepan dan tim dokter mata berpengalaman internasional.',
                'services' => ['Pemeriksaan Mata', 'LASIK', 'Operasi Katarak', 'Retina', 'Glaukoma', 'Kornea', 'Oculoplasty'],
                'facilities' => ['LASIK Suite', 'Retina Center', 'OCT Scanner', 'Phacoemulsification', 'Vitrectomy Equipment'],
                'operating_hours' => [
                    'senin' => '08:00-18:00',
                    'selasa' => '08:00-18:00',
                    'rabu' => '08:00-18:00',
                    'kamis' => '08:00-18:00',
                    'jumat' => '08:00-18:00',
                    'sabtu' => '08:00-15:00',
                    'minggu' => '08:00-12:00'
                ],
                'emergency_contact' => '(0274) 2809000',
                'latitude' => -7.7520,
                'longitude' => 110.3889,
                'featured' => true,
                'active' => true
            ],
            [
                'name' => 'Klinik Spesialis Penyakit Dalam RS Queen Latifa',
                'type' => 'specialist_clinic',
                'address' => 'Jl. Siliwangi No. 118, Yogyakarta',
                'phone' => '(0274) 620555',
                'email' => 'penyakitdalam@rsqueenlatifa.com',
                'website' => 'https://rsqueenlatifa.com',
                'description' => 'Klinik spesialis penyakit dalam dengan pelayanan internal medicine komprehensif dan teknologi diagnostik modern.',
                'services' => ['Konsultasi Penyakit Dalam', 'Diabetes', 'Hipertensi', 'Gastroenterologi', 'Hepatologi', 'Nefrologi', 'Endokrinologi'],
                'facilities' => ['Internal Medicine Ward', 'Endoscopy Unit', 'Dialysis Center', 'Diabetes Center', 'Cardiac Care'],
                'operating_hours' => [
                    'senin' => '08:00-17:00',
                    'selasa' => '08:00-17:00',
                    'rabu' => '08:00-17:00',
                    'kamis' => '08:00-17:00',
                    'jumat' => '08:00-17:00',
                    'sabtu' => '08:00-12:00',
                    'minggu' => 'Tutup'
                ],
                'emergency_contact' => '(0274) 620555',
                'latitude' => -7.7834,
                'longitude' => 110.3567,
                'featured' => false,
                'active' => true
            ],
            [
                'name' => 'Klinik Spesialis Kandungan RS Panti Rini',
                'type' => 'specialist_clinic',
                'address' => 'Jl. Solo Km 13.2, Yogyakarta',
                'phone' => '(0274) 497323',
                'email' => 'kandungan@pantirini.co.id',
                'website' => 'https://pantirini.co.id',
                'description' => 'Klinik spesialis kandungan dan kebidanan dengan fasilitas lengkap untuk kesehatan reproduksi wanita.',
                'services' => ['Konsultasi Kandungan', 'USG 4D', 'Persalinan', 'KB', 'Infertilitas', 'Menopause', 'Ginekologi Onkologi'],
                'facilities' => ['Delivery Room', 'NICU', 'USG 4D', 'IVF Center', 'Maternity Ward'],
                'operating_hours' => [
                    'senin' => '08:00-17:00',
                    'selasa' => '08:00-17:00',
                    'rabu' => '08:00-17:00',
                    'kamis' => '08:00-17:00',
                    'jumat' => '08:00-17:00',
                    'sabtu' => '08:00-12:00',
                    'minggu' => 'Tutup'
                ],
                'emergency_contact' => '(0274) 497323',
                'latitude' => -7.7623,
                'longitude' => 110.4456,
                'featured' => false,
                'active' => true
            ],
            [
                'name' => 'Klinik Spesialis Jantung RS JIH',
                'type' => 'specialist_clinic',
                'address' => 'Jl. Ringroad Utara, Yogyakarta',
                'phone' => '(0274) 4463555',
                'email' => 'jantung@jih.co.id',
                'website' => 'https://jih.co.id',
                'description' => 'Klinik spesialis jantung dengan teknologi kardiovaskular terdepan dan tim ahli jantung berpengalaman.',
                'services' => ['Konsultasi Jantung', 'Kateterisasi', 'Angioplasti', 'Bypass Surgery', 'Pacemaker', 'Aritmia', 'Heart Failure'],
                'facilities' => ['Cath Lab', 'Cardiac Surgery OR', 'CCU', 'Echo Lab', 'Cardiac Rehabilitation'],
                'operating_hours' => [
                    'senin' => '08:00-17:00',
                    'selasa' => '08:00-17:00',
                    'rabu' => '08:00-17:00',
                    'kamis' => '08:00-17:00',
                    'jumat' => '08:00-17:00',
                    'sabtu' => '08:00-12:00',
                    'minggu' => 'Tutup'
                ],
                'emergency_contact' => '(0274) 4463555',
                'latitude' => -7.7234,
                'longitude' => 110.3789,
                'featured' => false,
                'active' => true
            ],
            [
                'name' => 'Klinik Spesialis Gizi RSUD Wates',
                'type' => 'specialist_clinic',
                'address' => 'Jl. Tentara Pelajar No.1, Wates, Kulon Progo',
                'phone' => '(0274) 773169',
                'email' => 'gizi@rsudwates.com',
                'website' => 'https://rsudwates.com',
                'description' => 'Klinik spesialis gizi dengan pelayanan nutrisi komprehensif untuk berbagai kondisi kesehatan.',
                'services' => ['Konsultasi Gizi', 'Diet Therapy', 'Gizi Anak', 'Gizi Geriatri', 'Gizi Olahraga', 'Eating Disorder', 'Metabolic Syndrome'],
                'facilities' => ['Nutrition Counseling Room', 'Body Composition Analyzer', 'Metabolic Kitchen', 'Nutrition Lab'],
                'operating_hours' => [
                    'senin' => '08:00-15:00',
                    'selasa' => '08:00-15:00',
                    'rabu' => '08:00-15:00',
                    'kamis' => '08:00-15:00',
                    'jumat' => '08:00-15:00',
                    'sabtu' => '08:00-12:00',
                    'minggu' => 'Tutup'
                ],
                'emergency_contact' => '(0274) 773169',
                'latitude' => -7.8567,
                'longitude' => 110.1589,
                'featured' => false,
                'active' => true
            ]
        ];

        foreach ($specialistClinics as $clinic) {
            Hospital::create($clinic);
        }
    }
}