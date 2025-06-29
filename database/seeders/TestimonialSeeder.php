<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    public function run()
    {
        $testimonials = [
            [
                'title' => 'Excellent Experience',
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'message' => 'HappyCare has been amazing for my health journey. The doctors are very professional and caring. I found the perfect specialist for my condition through their platform.',
                'rating' => 5,
                'approved' => true,
                'featured' => true,
                'position' => 'Software Engineer',
                'company' => 'Tech Corp',
            ],
            [
                'title' => 'Outstanding Service',
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'message' => 'Excellent service and very convenient online consultations. The hospital recommendations were spot on. Highly recommended for anyone looking for quality healthcare!',
                'rating' => 5,
                'approved' => true,
                'featured' => true,
                'position' => 'Marketing Manager',
                'company' => 'Digital Agency',
            ],
            [
                'title' => 'Smooth and Helpful',
                'name' => 'Mike Johnson',
                'email' => 'mike@example.com',
                'message' => 'The hospital recommendations were spot on. Found the perfect specialist for my condition. The booking process was smooth and hassle-free.',
                'rating' => 4,
                'approved' => true,
                'featured' => false,
                'position' => 'Business Owner',
                'company' => 'Johnson & Co',
            ],
            [
                'title' => 'Great Healthcare Platform',
                'name' => 'Sarah Wilson',
                'email' => 'sarah@example.com',
                'message' => 'Great platform for health information and finding quality healthcare providers. The tour recommendations were also excellent for my family vacation.',
                'rating' => 5,
                'approved' => true,
                'featured' => false,
                'position' => 'Teacher',
                'company' => 'Local School',
            ],
            [
                'title' => 'Life-Saving Platform',
                'name' => 'David Brown',
                'email' => 'david@example.com',
                'message' => 'Very helpful platform with comprehensive health resources. The emergency care center they recommended saved my life during a critical situation.',
                'rating' => 5,
                'approved' => false,
                'featured' => false,
                'position' => 'Engineer',
                'company' => 'Construction Ltd',
            ],
            [
                'title' => 'Perfect Family Vacation',
                'name' => 'Lisa Anderson',
                'email' => 'lisa@example.com',
                'message' => 'Outstanding service! The family tour package was perfect for our vacation. Kids loved every moment and we created wonderful memories.',
                'rating' => 5,
                'approved' => true,
                'featured' => true,
                'position' => 'Nurse',
                'company' => 'City Hospital',
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
