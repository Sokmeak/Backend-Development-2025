<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Comment::insert([
        //     ['article_id' => 1, 'commenter_name' => 'Alice', 'comment_text' => 'This article is very helpful!'],
        //     ['article_id' => 1, 'commenter_name' => 'Bob', 'comment_text' => 'I learned a lot, thanks!'],
        //     ['article_id' => 2, 'commenter_name' => 'Charlie', 'comment_text' => 'Interesting insights!'],
        // ]);

        Comment::factory()->count(10)->create(); // Generates 10 fake comments
    }
}
