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
        return $this->belongsTo(Cart::class, 'cartID', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Categories::class, 'categoryID','id');
    }

    public function orders()
    {
        return $this->belongsToMany(Orders::class, 'orderDetail', 'productID', 'orderID')
                    ->withPivot('quantity','totalPrice');
    }

    public function rating()
    {
        return $this->hasMany(Rating::class, 'productID', 'id');
    }

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
