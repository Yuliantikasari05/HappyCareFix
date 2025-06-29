<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Urutan penting: User harus dibuat dulu sebelum Article
        $this->call([
            UserSeeder::class,          // Buat users dulu (termasuk admin)
            HospitalSeeder::class,      // Buat hospitals          
            TestimonialSeeder::class,   // Buat testimonials
            ArticleSeeder::class,  
            CategorySeeder::class,     // Buat articles (butuh user_id)
            SpecialistClinicSeeder::class,
            EmergencySeeder::class,
            NatureTourSeeder::class,
            FamilyTourSeeder::class,
            CulinaryTourSeeder::class,
        ]);
    }
}