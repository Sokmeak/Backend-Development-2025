<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    //
    protected $fillable = ['name', 'email', 'address', 'phone'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];


    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function productsThroughCart()
    {
        return $this->hasManyThrough(Product::class, Cart::class, 'customer_id', 'id', 'id', 'product_id');
    }
}
