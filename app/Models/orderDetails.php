<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderDetails extends Model
{
    use HasFactory;

    protected $table = 'orderDetail'; // Specify the table name if it does not follow Laravel's naming conventions

    protected $fillable = [
        'orderID',
        'productID',
        'quantity',
        'totalPrice',
    ];

    public function order()
    {
        return $this->belongsTo(Orders::class, 'orderID'); // Define the relationship with Orders
    }

    public function product()
    {
        return $this->belongsTo(Products::class, 'productID'); // Define the relationship with Products
    }
}
