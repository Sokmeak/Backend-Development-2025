<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;   

class Cart extends Model
{

    protected $fillable = ['customer_id', 'product_id', 'quantity', 'total'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}


//In Laravel, the $fillable property is used to specify which attributes should 
// be mass-assignable. Mass assignment is a convenient way to create or update a 
// model with an array of attributes. By defining the $fillable property, 
// you are protecting your model against mass-assignment vulnerabilities
//  by explicitly listing the attributes that can be mass-assigned.

// <?php
// $cart = Cart::create([
//     'customer_id' => 1,
//     'product_id' => 2,
//     'quantity' => 3,
//     'total' => 100.00
// ]);

// In this example, the create method will only assign values to the attributes listed in the $fillable
//  array. Any attributes not listed in $fillable will be ignored, thus preventing unwanted or malicious 
// data from being assigned to the model.

// Your current Cart model allows mass assignment for customer_id, product_id, quantity, and total attributes.