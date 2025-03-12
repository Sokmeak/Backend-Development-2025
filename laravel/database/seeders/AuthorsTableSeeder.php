<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;
use Illuminate\Support\Facades\DB;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // DB::table('authors')->insert([
        //     ['name' => 'John Doe', 'email' => 'johndoe@example.com'],
        //     ['name' => 'Jane Smith', 'email' => 'janesmith@example.com'], // Unique email
        // ]);

    
        Author::factory()->count(10)->create(); // Generates 10 fake authors

    }
}
