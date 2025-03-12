<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     public function run(){
        // Article::insert([
        //     ['title' => 'How to Learn SQL', 'content' => 'SQL is a powerful language...', 'author_id' => 1],
        //     ['title' => 'Best Programming Languages in 2025', 'content' => 'Here are the top languages...', 'author_id' => 2],
        // ]);

        Article::factory()->count(10)->create(); // Generates 10 fake articles

     }
    
}
