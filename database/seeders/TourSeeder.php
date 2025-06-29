<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tour;

class TourSeeder extends Seeder
{
    public function run()
    {
        $tours = [
            [
                'name' => 'Borobudur Nature Adventure',
                'category' => 'nature',
                'description' => 'Explore the beautiful nature around Borobudur temple with guided hiking trails, bird watching, and stunning sunrise views. This tour combines cultural heritage with natural beauty.',
                'price' => 150.00,
                'duration' => '2 days 1 night',
                'location' => 'Yogyakarta, Indonesia',
                'includes' => 'Transportation, Accommodation, Meals, Guide, Entrance Tickets',
                'excludes' => 'Personal Expenses, Travel Insurance',
                'itinerary' => 'Day 1: Arrival, Temple Visit, Sunset Viewing. Day 2: Sunrise Tour, Nature Walk, Departure',
                'max_participants' => 15,
                'difficulty_level' => 'moderate',
            ],
            [
                'name' => 'Jakarta Culinary Tour',
                'category' => 'culinary',
                'description' => 'Taste the best local foods in Jakarta with our expert food guide. Visit traditional markets, street food vendors, and authentic restaurants.',
                'price' => 75.00,
                'duration' => '1 day',
                'location' => 'Jakarta, Indonesia',
                'includes' => 'Transportation, Food Tastings, Guide, Water',
                'excludes' => 'Additional Drinks, Personal Expenses',
                'itinerary' => 'Morning: Traditional Market Tour. Afternoon: Street Food Adventure. Evening: Restaurant Dining',
                'max_participants' => 12,
                'difficulty_level' => 'easy',
            ],
            [
                'name' => 'Bali Family Beach Resort',
                'category' => 'family',
                'description' => 'Perfect family vacation at Bali beaches with kid-friendly activities, water sports, and cultural experiences suitable for all ages.',
                'price' => 300.00,
                'duration' => '3 days 2 nights',
                'location' => 'Bali, Indonesia',
                'includes' => 'Accommodation, Meals, Activities, Transportation, Guide',
                'excludes' => 'Flights, Travel Insurance, Personal Expenses',
                'itinerary' => 'Day 1: Beach Activities. Day 2: Cultural Tour, Water Sports. Day 3: Shopping, Departure',
                'max_participants' => 20,
                'difficulty_level' => 'easy',
            ],
            [
                'name' => 'Mount Bromo Sunrise Trek',
                'category' => 'nature',
                'description' => 'Experience the breathtaking sunrise at Mount Bromo with this adventurous trekking tour. Perfect for nature lovers and photography enthusiasts.',
                'price' => 200.00,
                'duration' => '2 days 1 night',
                'location' => 'East Java, Indonesia',
                'includes' => 'Transportation, Accommodation, Meals, Guide, Jeep Rental',
                'excludes' => 'Personal Equipment, Travel Insurance',
                'itinerary' => 'Day 1: Travel, Base Camp Setup. Day 2: Early Morning Trek, Sunrise Viewing, Return',
                'max_participants' => 10,
                'difficulty_level' => 'hard',
            ],
            [
                'name' => 'Bandung Food and Culture',
                'category' => 'culinary',
                'description' => 'Discover Bandung\'s rich culinary heritage and cultural attractions. Visit local eateries, traditional markets, and cultural sites.',
                'price' => 120.00,
                'duration' => '2 days 1 night',
                'location' => 'Bandung, Indonesia',
                'includes' => 'Transportation, Accommodation, Meals, Guide',
                'excludes' => 'Shopping, Personal Expenses',
                'itinerary' => 'Day 1: City Tour, Food Tasting. Day 2: Cultural Sites, Local Markets',
                'max_participants' => 16,
                'difficulty_level' => 'easy',
            ],
            [
                'name' => 'Yogyakarta Family Heritage Tour',
                'category' => 'family',
                'description' => 'Educational and fun family tour exploring Yogyakarta\'s cultural heritage with interactive activities for children and adults.',
                'price' => 180.00,
                'duration' => '2 days 1 night',
                'location' => 'Yogyakarta, Indonesia',
                'includes' => 'Accommodation, Meals, Transportation, Guide, Activity Materials',
                'excludes' => 'Souvenirs, Personal Expenses',
                'itinerary' => 'Day 1: Palace Tour, Traditional Crafts. Day 2: Temple Visit, Cultural Performance',
                'max_participants' => 18,
                'difficulty_level' => 'easy',
            ],
        ];

        foreach ($tours as $tour) {
            Tour::create($tour);
        }
    }
}