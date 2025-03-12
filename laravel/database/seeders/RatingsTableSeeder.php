<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rating;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Rating::insert([
        //     ['article_id' => 1, 'rating' => 5, 'rated_by' => 'David'],
        //     ['article_id' => 1, 'rating' => 4, 'rated_by' => 'Emma'],
        //     ['article_id' => 2, 'rating' => 5, 'rated_by' => 'Frank'],
        // ]);

        Rating::factory()->count(10)->create(); // Generates 10 fake ratings
    }
}
