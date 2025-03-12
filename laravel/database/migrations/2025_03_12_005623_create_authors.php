<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    //  create the author table
    // Define the relationships between the tables
  

    // also add the relationship between the author and article table
    public function up(): void
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamps();
        });

     
    }   


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('author');
    }
};
