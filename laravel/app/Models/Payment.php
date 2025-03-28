<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Payment extends Model
{
    //
    protected $fillable = ['order_id', 'payment_method', 'payment_date', 'amount'];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}


