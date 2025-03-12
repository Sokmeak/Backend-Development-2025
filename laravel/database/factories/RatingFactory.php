<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

        protected $model = \App\Models\Rating::class;
    public function definition(): array
    {
        return [
            'rating' => $this->faker->numberBetween(1, 5),
            'rated_by' => $this->faker->name,
            'article_id' => \App\Models\Article::factory(),
            //
        ];
    }
}
