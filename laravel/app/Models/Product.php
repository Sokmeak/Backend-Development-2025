<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;


class Product extends Model
{
    //
    use HasFactory;

    protected $fillable = ['name', 'pricing', 'category_id', 'discounted', 'active'];

  

    ### What is Eloquent in Laravel?

/*Eloquent is Laravel's **ORM (Object-Relational Mapping)** that provides an intuitive and powerful way to interact with 
databases using PHP objects instead of writing raw SQL queries.
 It allows developers to define models that map directly to database tables, making database operations more efficient and readable.

### Key Features of Eloquent:
1. **Active Record Implementation** – Each model represents a table, and each instance corresponds to a row.
2. **Query Builder** – Allows building queries using PHP methods instead of SQL.
3. **Relationships** – Supports defining relationships like one-to-one, one-to-many, and many-to-many.
4. **Mass Assignment** – Enables inserting multiple attributes at once (`$fillable` or `$guarded`).
5. **Model Events & Observers** – Hooks into model events like `created`, `updated`, and `deleted`.
6. **Soft Deletes** – Allows marking records as deleted without removing them from the database.
7. **Mutators & Accessors** – Modify attributes before saving or retrieving from the database.

 */
}
