<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Kesehatan Umum',
                'description' => 'Artikel tentang kesehatan umum dan tips menjaga kesehatan',
            ],
            [
                'name' => 'Tips Kesehatan',
                'description' => 'Tips dan trik untuk menjaga kesehatan sehari-hari',
            ],
            [
                'name' => 'Berita Medis',
                'description' => 'Berita terbaru seputar dunia medis dan kesehatan',
            ],
            [
                'name' => 'Gaya Hidup Sehat',
                'description' => 'Artikel tentang gaya hidup sehat dan pola hidup seimbang',
            ],
            [
                'name' => 'Nutrisi',
                'description' => 'Informasi tentang nutrisi, makanan sehat, dan diet',
            ],
        ];

        foreach ($categories as $category) {
            $slug = Str::slug($category['name']);
            
            Category::updateOrCreate(
                ['slug' => $slug], // Kondisi pencarian
                [
                    'name' => $category['name'],
                    'slug' => $slug,
                    'description' => $category['description'],
                ]
            );
        }
        
        $this->command->info('Categories seeded successfully!');
    }
}