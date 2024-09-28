<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Products; 
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function display_product()
    {
        $userId = Auth::id(); // Get the authenticated user's ID
        $products = Products::paginate(8);
        return view("display_product",compact('products'));
    }
}
