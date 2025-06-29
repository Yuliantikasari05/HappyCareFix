<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        // Cari admin user, jika tidak ada ambil user pertama, jika tidak ada buat admin
        $admin = User::where('role', 'admin')->first();
        
        if (!$admin) {
            $admin = User::first();
        }
        
        if (!$admin) {
            // Jika tidak ada user sama sekali, buat admin user
            $admin = User::create([
                'name' => 'Admin User',
                'email' => 'admin@happycare.com',
                'password' => bcrypt('password'),
                'role' => 'admin',
                'status' => 'active',
                'email_verified_at' => now(),
            ]);
        }

        $articles = [
            [
                'title' => 'Benefits of Regular Health Checkups',
                'slug' => 'benefits-of-regular-health-checkups',
                'content' => 'Regular health checkups are essential for maintaining good health and preventing diseases. During these checkups, healthcare professionals can detect potential health issues early, when they are most treatable. This proactive approach to healthcare can save lives and reduce healthcare costs in the long run. Regular checkups typically include vital sign measurements, blood tests, and screenings for common conditions like diabetes, high blood pressure, and cancer.',
                'excerpt' => 'Learn about the importance of regular health checkups and how they can help prevent serious health issues.',
                'published' => true,
                'featured' => true,
                'user_id' => $admin->id,
                'views_count' => 150,
            ],
            [
                'title' => 'Mental Health Awareness',
                'slug' => 'mental-health-awareness',
                'content' => 'Mental health is just as important as physical health, yet it often receives less attention. Mental health conditions affect millions of people worldwide and can significantly impact quality of life. It is important to recognize the signs of mental health issues and seek help when needed. Common mental health conditions include depression, anxiety, bipolar disorder, and PTSD. Treatment options include therapy, medication, and lifestyle changes.',
                'excerpt' => 'Understanding the importance of mental health and recognizing when to seek professional help.',
                'published' => true,
                'featured' => false,
                'user_id' => $admin->id,
                'views_count' => 89,
            ],
            [
                'title' => 'Healthy Eating Habits',
                'slug' => 'healthy-eating-habits',
                'content' => 'Developing healthy eating habits is crucial for overall wellness and disease prevention. A balanced diet should include a variety of fruits, vegetables, whole grains, lean proteins, and healthy fats. It is important to limit processed foods, sugary drinks, and excessive amounts of sodium and saturated fat. Meal planning and preparation can help you maintain healthy eating habits even with a busy schedule.',
                'excerpt' => 'Tips for maintaining a healthy diet and developing sustainable eating habits.',
                'published' => true,
                'featured' => false,
                'user_id' => $admin->id,
                'views_count' => 67,
            ],
            [
                'title' => 'Exercise and Physical Fitness',
                'slug' => 'exercise-and-physical-fitness',
                'content' => 'Regular physical activity is one of the most important things you can do for your health. Exercise helps control weight, reduces the risk of heart disease, strengthens bones and muscles, and improves mental health. The recommended amount of exercise for adults is at least 150 minutes of moderate-intensity aerobic activity per week, plus muscle-strengthening activities on two or more days per week.',
                'excerpt' => 'Discover the benefits of regular exercise and how to incorporate physical activity into your daily routine.',
                'published' => true,
                'featured' => true,
                'user_id' => $admin->id,
                'views_count' => 203,
            ],
            [
                'title' => 'Sleep and Its Impact on Health',
                'slug' => 'sleep-and-its-impact-on-health',
                'content' => 'Quality sleep is essential for good health and well-being. During sleep, your body repairs itself and your brain consolidates memories. Poor sleep can lead to a variety of health problems, including obesity, diabetes, cardiovascular disease, and weakened immune function. Most adults need 7-9 hours of sleep per night. Good sleep hygiene practices include maintaining a consistent sleep schedule, creating a comfortable sleep environment, and avoiding caffeine and electronics before bedtime.',
                'excerpt' => 'Learn about the importance of quality sleep and tips for improving your sleep habits.',
                'published' => false,
                'featured' => false,
                'user_id' => $admin->id,
                'views_count' => 45,
            ],
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}