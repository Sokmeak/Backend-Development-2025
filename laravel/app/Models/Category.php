<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;




class Category extends Model
{
    //
    use HasFactory;
    protected $fillable = ['name'];
}

// In Laravel, a "model" is a PHP class that represents a database table, allowing developers to interact
// with data within that table using an object-oriented approach through Laravel's Eloquent ORM, essentially
// acting as a bridge between the application logic and the database by providing methods to retrieve, create, 
// update, and delete records with simple, readable code; it is considered the core component of the MVC architecture, 
//representing the "M" in Model-View-Controller

