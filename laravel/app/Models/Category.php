<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Prompts\Concerns\Fallback;

class Category extends Model
{
    //
    use HasFactory;
    protected $fillable = ['name'];
}
