<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = \App\Models\Comment::class;
    public function definition(): array
    {
        return [
          
            'commenter_name' => $this->faker->name,
            'comment_text' => $this->faker->paragraph,
            'article_id' => \App\Models\Article::factory(),
            //
        ];
    }
}
