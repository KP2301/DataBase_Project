<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Products; 
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function display_cart()
    {
        $userId = Auth::id(); // Get the authenticated user's ID
        return view("cart.display_cart");
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'productID' => 'required|exists:products,id',
            'totalAmount' => 'required|integer|min:1',
        ]);

        $products = Products::find($request->productID);
        
        if (!$products) {
            return back()->with('error', 'Product not found.');
        }

        // Create or update the cart item
        Cart::updateOrCreate(
            [
                'customerID' => Auth::id(),
                'productID' => $products->id,
            ],
            [
                'totalAmount' => $request->totalAmount,
                'totalPrice' => $products->price * $request->totalAmount,
            ]
        );

        $products->remainProduct -= $request->totalAmount;
        $products->save();

        return back()->with('success', 'Product added to cart successfully!');
    }
}
