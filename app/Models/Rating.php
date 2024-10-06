<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $table = 'rating';

    protected $fillable = [
        'star',
        'customerID',
        'productID',
        'orderID',
    ];

    public function product()
    {
        return $this->belongsTo(Products::class, 'productID', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customerID', 'id');
    }


    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
