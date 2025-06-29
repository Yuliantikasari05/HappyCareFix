<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hospital;

class EmergencySeeder extends Seeder
{
    public function run()
    {
        $emergencyCenters = [
            [
                'name' => 'RSUP Dr. Sardjito - IGD',
                'type' => 'emergency_center',
                'address' => 'Jl. Kesehatan No. 1, Sekip, Yogyakarta',
                'phone' => '(0274) 631190',
                'email' => 'igd@sardjito.co.id',
                'website' => 'https://sardjito.co.id',
                'description' => 'Unit Gawat Darurat RSUP Dr. Sardjito adalah IGD rujukan nasional dengan fasilitas trauma center lengkap dan tim medis 24 jam.',
                'services' => ['Trauma Center', 'Resusitasi', 'Emergency Surgery', 'Stroke Unit', 'STEMI Center', 'Poison Center', 'Emergency Pediatric'],
                'facilities' => ['Ruang Resusitasi', 'Trauma Bay', 'Emergency OR', 'CT Scan 24 Jam', 'Laboratorium 24 Jam', 'Ambulans', 'Helipad'],
                'operating_hours' => [
                    'senin' => '24 Jam',
                    'selasa' => '24 Jam',
                    'rabu' => '24 Jam',
                    'kamis' => '24 Jam',
                    'jumat' => '24 Jam',
                    'sabtu' => '24 Jam',
                    'minggu' => '24 Jam'
                ],
                'emergency_contact' => '(0274) 631190',
                'latitude' => -7.7687,
                'longitude' => 110.3739,
                'featured' => true,
                'active' => true
            ],
            [
                'name' => 'RS Panti Rapih - IGD',
                'type' => 'emergency_center',
                'address' => 'Jl. Cik Ditiro No. 30, Yogyakarta',
                'phone' => '(0274) 552118',
                'email' => 'igd@pantirapih.or.id',
                'website' => 'https://pantirapih.or.id',
                'description' => 'IGD RS Panti Rapih melayani kegawatdaruratan 24 jam dengan tim medis berpengalaman dan fasilitas modern.',
                'services' => ['Emergency Medicine', 'Trauma Care', 'Cardiac Emergency', 'Stroke Care', 'Emergency Pediatric', 'Obstetric Emergency'],
                'facilities' => ['Emergency Room', 'Trauma Room', 'Observation Room', 'Emergency Lab', 'Emergency Radiology', 'Ambulans'],
                'operating_hours' => [
                    'senin' => '24 Jam',
                    'selasa' => '24 Jam',
                    'rabu' => '24 Jam',
                    'kamis' => '24 Jam',
                    'jumat' => '24 Jam',
                    'sabtu' => '24 Jam',
                    'minggu' => '24 Jam'
                ],
                'emergency_contact' => '(0274) 552118',
                'latitude' => -7.7851,
                'longitude' => 110.3742,
                'featured' => true,
                'active' => true
            ],
            [
                'name' => 'RSU Queen Latifa - IGD',
                'type' => 'emergency_center',
                'address' => 'Jl. Siliwangi No. 118, Gamping, Sleman',
                'phone' => '(0274) 620555',
                'email' => 'igd@rsqueenlatifa.com',
                'website' => 'https://rsqueenlatifa.com',
                'description' => 'IGD RSU Queen Latifa memberikan pelayanan gawat darurat 24 jam dengan standar pelayanan tinggi.',
                'services' => ['Emergency Care', 'Trauma Treatment', 'Emergency Surgery', 'Critical Care', 'Emergency Radiology'],
                'facilities' => ['Emergency Ward', 'Trauma Center', 'Emergency OR', 'ICU', 'Emergency Lab'],
                'operating_hours' => [
                    'senin' => '24 Jam',
                    'selasa' => '24 Jam',
                    'rabu' => '24 Jam',
                    'kamis' => '24 Jam',
                    'jumat' => '24 Jam',
                    'sabtu' => '24 Jam',
                    'minggu' => '24 Jam'
                ],
                'emergency_contact' => '(0274) 620555',
                'latitude' => -7.7834,
                'longitude' => 110.3567,
                'featured' => false,
                'active' => true
            ],
            [
                'name' => 'RS PKU Muhammadiyah Kotagede - IGD',
                'type' => 'emergency_center',
                'address' => 'Jl. Ngeksigondo No. 56, Kotagede, Yogyakarta',
                'phone' => '(0274) 375396',
                'email' => 'igd@pkukotagede.com',
                'website' => 'https://pkukotagede.com',
                'description' => 'IGD RS PKU Muhammadiyah Kotagede melayani kegawatdaruratan dengan tim medis profesional 24 jam.',
                'services' => ['Emergency Medicine', 'Trauma Care', 'Emergency Pediatric', 'Emergency Internal Medicine'],
                'facilities' => ['Emergency Room', 'Observation Room', 'Emergency Lab', 'Emergency Pharmacy', 'Ambulans'],
                'operating_hours' => [
                    'senin' => '24 Jam',
                    'selasa' => '24 Jam',
                    'rabu' => '24 Jam',
                    'kamis' => '24 Jam',
                    'jumat' => '24 Jam',
                    'sabtu' => '24 Jam',
                    'minggu' => '24 Jam'
                ],
                'emergency_contact' => '(0274) 375396',
                'latitude' => -7.8156,
                'longitude' => 110.3889,
                'featured' => false,
                'active' => true
            ],
            [
                'name' => 'RS Pratama Kota Yogyakarta - IGD',
                'type' => 'emergency_center',
                'address' => 'Jl. Gondosuli No. 6, Yogyakarta',
                'phone' => '(0274) 420118',
                'email' => 'igd@rspratama.com',
                'website' => 'https://rspratama.com',
                'description' => 'IGD RS Pratama Kota Yogyakarta memberikan pelayanan gawat darurat dengan fasilitas lengkap.',
                'services' => ['Emergency Care', 'First Aid', 'Emergency Medicine', 'Trauma Treatment'],
                'facilities' => ['Emergency Room', 'Trauma Room', 'Emergency Lab', 'Emergency Radiology'],
                'operating_hours' => [
                    'senin' => '24 Jam',
                    'selasa' => '24 Jam',
                    'rabu' => '24 Jam',
                    'kamis' => '24 Jam',
                    'jumat' => '24 Jam',
                    'sabtu' => '24 Jam',
                    'minggu' => '24 Jam'
                ],
                'emergency_contact' => '(0274) 420118',
                'latitude' => -7.7923,
                'longitude' => 110.3712,
                'featured' => false,
                'active' => true
            ],
            [
                'name' => 'RS Hermina Yogyakarta - IGD',
                'type' => 'emergency_center',
                'address' => 'Jl. Magelang Km 6, Yogyakarta',
                'phone' => '+62 811-2823-535',
                'email' => 'igd@herminayogyakarta.com',
                'website' => 'https://herminayogyakarta.com',
                'description' => 'IGD RS Hermina Yogyakarta dengan pelayanan emergency modern dan tim medis berpengalaman.',
                'services' => ['Emergency Medicine', 'Trauma Care', 'Emergency Pediatric', 'Emergency Obstetric', 'Critical Care'],
                'facilities' => ['Emergency Ward', 'Trauma Center', 'NICU', 'Emergency OR', 'Emergency Lab'],
                'operating_hours' => [
                    'senin' => '24 Jam',
                    'selasa' => '24 Jam',
                    'rabu' => '24 Jam',
                    'kamis' => '24 Jam',
                    'jumat' => '24 Jam',
                    'sabtu' => '24 Jam',
                    'minggu' => '24 Jam'
                ],
                'emergency_contact' => '+62 811-2823-535',
                'latitude' => -7.7456,
                'longitude' => 110.3234,
                'featured' => false,
                'active' => true
            ],
            [
                'name' => 'RSU Rajawali Citra - IGD',
                'type' => 'emergency_center',
                'address' => 'Jl. Rajawali No. 1, Yogyakarta',
                'phone' => '(0274) 4463535',
                'email' => 'igd@rajawalicitra.com',
                'website' => 'https://rajawalicitra.com',
                'description' => 'IGD RSU Rajawali Citra melayani kegawatdaruratan dengan standar pelayanan tinggi dan fasilitas modern.',
                'services' => ['Emergency Medicine', 'Trauma Care', 'Emergency Surgery', 'Critical Care'],
                'facilities' => ['Emergency Room', 'Trauma Bay', 'Emergency OR', 'ICU', 'Emergency Radiology'],
                'operating_hours' => [
                    'senin' => '24 Jam',
                    'selasa' => '24 Jam',
                    'rabu' => '24 Jam',
                    'kamis' => '24 Jam',
                    'jumat' => '24 Jam',
                    'sabtu' => '24 Jam',
                    'minggu' => '24 Jam'
                ],
                'emergency_contact' => '(0274) 4463535',
                'latitude' => -7.7789,
                'longitude' => 110.3678,
                'featured' => false,
                'active' => true
            ],
            [
                'name' => 'RSU Islam Indonesia - IGD',
                'type' => 'emergency_center',
                'address' => 'Jl. Kaliurang Km 14.5, Sleman',
                'phone' => '(0274) 2812111',
                'email' => 'igd@rsuii.co.id',
                'website' => 'https://rsuii.co.id',
                'description' => 'IGD RSU Islam Indonesia dengan pelayanan gawat darurat komprehensif dan tim medis 24 jam.',
                'services' => ['Emergency Medicine', 'Trauma Center', 'Emergency Pediatric', 'Emergency Internal Medicine'],
                'facilities' => ['Emergency Ward', 'Trauma Room', 'Emergency Lab', 'Emergency Radiology', 'Ambulans'],
                'operating_hours' => [
                    'senin' => '24 Jam',
                    'selasa' => '24 Jam',
                    'rabu' => '24 Jam',
                    'kamis' => '24 Jam',
                    'jumat' => '24 Jam',
                    'sabtu' => '24 Jam',
                    'minggu' => '24 Jam'
                ],
                'emergency_contact' => '(0274) 2812111',
                'latitude' => -7.6789,
                'longitude' => 110.3456,
                'featured' => false,
                'active' => true
            ],
            [
                'name' => 'RS PKU Muhammadiyah Yogyakarta - IGD',
                'type' => 'emergency_center',
                'address' => 'Jl. KHA Dahlan No. 20, Yogyakarta',
                'phone' => '(0274) 512653',
                'email' => 'igd@rspku.com',
                'website' => 'https://rspku.com',
                'description' => 'IGD RS PKU Muhammadiyah Yogyakarta dengan pelayanan emergency terpadu dan fasilitas lengkap.',
                'services' => ['Emergency Medicine', 'Trauma Care', 'Emergency Surgery', 'Cardiac Emergency', 'Stroke Care'],
                'facilities' => ['Emergency Room', 'Trauma Center', 'Emergency OR', 'CCU', 'Emergency Lab'],
                'operating_hours' => [
                    'senin' => '24 Jam',
                    'selasa' => '24 Jam',
                    'rabu' => '24 Jam',
                    'kamis' => '24 Jam',
                    'jumat' => '24 Jam',
                    'sabtu' => '24 Jam',
                    'minggu' => '24 Jam'
                ],
                'emergency_contact' => '(0274) 512653',
                'latitude' => -7.8014,
                'longitude' => 110.3644,
                'featured' => true,
                'active' => true
            ],
            [
                'name' => 'RSUD Wates - IGD',
                'type' => 'emergency_center',
                'address' => 'Jl. Tentara Pelajar No.1, Wates, Kulon Progo',
                'phone' => '(0274) 773169',
                'email' => 'igd@rsudwates.com',
                'website' => 'https://rsudwates.com',
                'description' => 'IGD RSUD Wates melayani kegawatdaruratan untuk wilayah Kulon Progo dengan fasilitas emergency lengkap.',
                'services' => ['Emergency Medicine', 'Trauma Care', 'Emergency Pediatric', 'Emergency Obstetric'],
                'facilities' => ['Emergency Room', 'Trauma Room', 'Emergency Lab', 'Emergency Radiology', 'Ambulans'],
                'operating_hours' => [
                    'senin' => '24 Jam',
                    'selasa' => '24 Jam',
                    'rabu' => '24 Jam',
                    'kamis' => '24 Jam',
                    'jumat' => '24 Jam',
                    'sabtu' => '24 Jam',
                    'minggu' => '24 Jam'
                ],
                'emergency_contact' => '(0274) 773169',
                'latitude' => -7.8567,
                'longitude' => 110.1589,
                'featured' => false,
                'active' => true
            ],
            [
                'name' => 'RS Universitas Islam Indonesia (UII) - IGD',
                'type' => 'emergency_center',
                'address' => 'Jl. Kaliurang KM 14.5, Sleman',
                'phone' => '(0274) 895287',
                'email' => 'igd@rsuii.ac.id',
                'website' => 'https://rsuii.ac.id',
                'description' => 'IGD RS UII dengan pelayanan gawat darurat modern dan tim medis akademis berpengalaman.',
                'services' => ['Emergency Medicine', 'Trauma Care', 'Emergency Research', 'Teaching Emergency'],
                'facilities' => ['Emergency Ward', 'Teaching Hospital', 'Emergency Lab', 'Emergency Radiology'],
                'operating_hours' => [
                    'senin' => '24 Jam',
                    'selasa' => '24 Jam',
                    'rabu' => '24 Jam',
                    'kamis' => '24 Jam',
                    'jumat' => '24 Jam',
                    'sabtu' => '24 Jam',
                    'minggu' => '24 Jam'
                ],
                'emergency_contact' => '(0274) 895287',
                'latitude' => -7.6789,
                'longitude' => 110.3456,
                'featured' => false,
                'active' => true
            ],
            [
                'name' => 'RSUD Panembahan Senopati - IGD',
                'type' => 'emergency_center',
                'address' => 'Jl. Dr. Wahidin Sudirohusodo No.4, Bantul',
                'phone' => '(0274) 367708',
                'email' => 'igd@rsudpanembahan.com',
                'website' => 'https://rsudpanembahan.com',
                'description' => 'IGD RSUD Panembahan Senopati melayani kegawatdaruratan untuk wilayah Bantul dan sekitarnya.',
                'services' => ['Emergency Medicine', 'Trauma Care', 'Emergency Pediatric', 'Emergency Surgery'],
                'facilities' => ['Emergency Room', 'Trauma Center', 'Emergency OR', 'Emergency Lab'],
                'operating_hours' => [
                    'senin' => '24 Jam',
                    'selasa' => '24 Jam',
                    'rabu' => '24 Jam',
                    'kamis' => '24 Jam',
                    'jumat' => '24 Jam',
                    'sabtu' => '24 Jam',
                    'minggu' => '24 Jam'
                ],
                'emergency_contact' => '(0274) 367708',
                'latitude' => -7.8789,
                'longitude' => 110.3234,
                'featured' => false,
                'active' => true
            ],
            [
                'name' => 'RS Nur Hidayah - IGD',
                'type' => 'emergency_center',
                'address' => 'Jl. Imogiri Timur KM 11, Bantul',
                'phone' => '(0274) 2810380',
                'email' => 'igd@rsnurhidayah.com',
                'website' => 'https://rsnurhidayah.com',
                'description' => 'IGD RS Nur Hidayah memberikan pelayanan gawat darurat dengan pendekatan islami dan fasilitas modern.',
                'services' => ['Emergency Medicine', 'Trauma Care', 'Emergency Pediatric', 'Islamic Emergency Care'],
                'facilities' => ['Emergency Room', 'Trauma Room', 'Emergency Lab', 'Prayer Room'],
                'operating_hours' => [
                    'senin' => '24 Jam',
                    'selasa' => '24 Jam',
                    'rabu' => '24 Jam',
                    'kamis' => '24 Jam',
                    'jumat' => '24 Jam',
                    'sabtu' => '24 Jam',
                    'minggu' => '24 Jam'
                ],
                'emergency_contact' => '(0274) 2810380',
                'latitude' => -7.9123,
                'longitude' => 110.3567,
                'featured' => false,
                'active' => true
            ],
            [
                'name' => 'RSUD Nyi Ageng Serang - IGD',
                'type' => 'emergency_center',
                'address' => 'Jl. Sentolo-Nanggulan Km 3, Sentolo, Kulon Progo',
                'phone' => '(0274) 773150',
                'email' => 'igd@rsudnas.com',
                'website' => 'https://rsudnas.com',
                'description' => 'IGD RSUD Nyi Ageng Serang melayani kegawatdaruratan untuk wilayah Kulon Progo bagian selatan.',
                'services' => ['Emergency Medicine', 'Trauma Care', 'Emergency Pediatric', 'Rural Emergency'],
                'facilities' => ['Emergency Room', 'Trauma Room', 'Emergency Lab', 'Ambulans'],
                'operating_hours' => [
                    'senin' => '24 Jam',
                    'selasa' => '24 Jam',
                    'rabu' => '24 Jam',
                    'kamis' => '24 Jam',
                    'jumat' => '24 Jam',
                    'sabtu' => '24 Jam',
                    'minggu' => '24 Jam'
                ],
                'emergency_contact' => '(0274) 773150',
                'latitude' => -7.8234,
                'longitude' => 110.1234,
                'featured' => false,
                'active' => true
            ],
            [
                'name' => 'RS Happy Land Medical Center - IGD',
                'type' => 'emergency_center',
                'address' => 'Jl. Ipda Tut Harsono No. 53, Yogyakarta',
                'phone' => '(0274) 550060',
                'email' => 'igd@rshappyland.com',
                'website' => 'https://rshappyland.com',
                'description' => 'IGD RS Happy Land Medical Center dengan pelayanan emergency modern dan tim medis profesional.',
                'services' => ['Emergency Medicine', 'Trauma Care', 'Emergency Surgery', 'Critical Care'],
                'facilities' => ['Emergency Room', 'Trauma Center', 'Emergency OR', 'ICU', 'Emergency Lab'],
                'operating_hours' => [
                    'senin' => '24 Jam',
                    'selasa' => '24 Jam',
                    'rabu' => '24 Jam',
                    'kamis' => '24 Jam',
                    'jumat' => '24 Jam',
                    'sabtu' => '24 Jam',
                    'minggu' => '24 Jam'
                ],
                'emergency_contact' => '(0274) 550060',
                'latitude' => -7.8156,
                'longitude' => 110.3889,
                'featured' => false,
                'active' => true
            ]
        ];

        foreach ($emergencyCenters as $emergency) {
            Hospital::create($emergency);
        }
    }
}