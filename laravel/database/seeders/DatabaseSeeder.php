<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\ArticlesTableSeeder;
use Database\Seeders\CommentsTableSeeder;
use Database\Seeders\RatingsTableSeeder;
use Database\Seeders\AuthorsTableSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    
    public function run(): void
    {
      
        $this->call([
            AuthorsTableSeeder::class,
            ArticlesTableSeeder::class,
            CommentsTableSeeder::class,
            RatingsTableSeeder::class,
        ]);
       

         
      
    }
   
}
