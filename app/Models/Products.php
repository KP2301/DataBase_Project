<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = [
        'name',
        'price',
        'remainProduct',
        'Rate_star',
        'description',
        'categoryID',
        'cartID',
        'product_photo',
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'id', 'productID'); // Adjust the foreign key as needed
    }

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
