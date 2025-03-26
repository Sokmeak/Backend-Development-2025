<?php

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Order extends Model
{
    //
    protected $table = 'orders';
    protected $fillable = ['order_date', 'customer_id', 'product_id', 'quantity', 'total_price'];

// Task 3 : 
    protected function orderDate() : Attribute
    {
        return Attribute::make(

            // Mutator: convert input format to database format before saving
          // set: fn($value) => Carbon::createFromDate('d/m/Y H:i:s', $value)->format('Y-m-d H:i:s'),

            set: fn($value) =>Carbon::createFromFormat('d/m/Y H:i:s', $value),


            // Accessor: convert database format to output format before returning
            get: fn($value) => Carbon::parse($value)->format('d/m/Y H:i:s')

        );
    }


    // Task 4: soft delete
    protected $dates = ['deleted_at'];




    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }
}
