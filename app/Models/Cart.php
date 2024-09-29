<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'totalAmount',
        'totalPrice',
        'customerID',
        'productID',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'productID', 'id'); // Adjust the foreign key as needed
    }

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
