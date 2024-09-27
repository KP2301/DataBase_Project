<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart; 
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function display_cart()
    {
        $userId = Auth::id(); // Get the authenticated user's ID
        return view("cart.display_cart");
    }
}
