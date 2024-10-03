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
         // Get the authenticated user's ID
         $userId = Auth::id();
        
         // Retrieve cart items for the authenticated user
         $cartItems = Cart::where('customerID', $userId)->get();
         
         // Initialize variables for calculation
         $products = [];
         $subtotal = $cartItems->sum('totalPrice');
 
         // Loop through cart items and retrieve product details
         foreach ($cartItems as $item) {
             $product = Products::find($item->product_id);
             
             if ($product) {
                 $products[] = [
                     'name' => $product->name, 
                     'price' => $product->price ?? 0, // Fallback value for price
                     'quantity' => $item->totalAmount,
                     'totalPrice' => $item->totalPrice
                 ];
             } else {
                 // Handle missing product case
                 continue;
             }
         }
         
         // Set shipping cost
         $shipping = $cartItems->isEmpty() ? 0 : 10; 
         
         // Calculate total
         $total = $subtotal + $shipping;
 
         // Pass the data to the view
         return view('cart.display_cart', compact('products', 'subtotal', 'shipping', 'total'));
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

        if ($products->remainProduct < $request->totalAmount) {
            return back()->with('error', 'Not enough products available.');
        }

        $existingCartItem = Cart::where('customerID', Auth::id())
                            ->where('productID', $products->id)
                            ->first();

        if ($existingCartItem) {
            // If it exists, increment the total amount and update the total price
            $existingCartItem->totalAmount += $request->totalAmount;
            $existingCartItem->totalPrice += $products->price * $request->totalAmount;
            $existingCartItem->save();
        } else {
            // If it doesn't exist, create a new cart item
            Cart::create([
                'customerID' => Auth::id(),
                'productID' => $products->id,
                'totalAmount' => $request->totalAmount,
                'totalPrice' => $products->price * $request->totalAmount,
            ]);
        }
        $products->remainProduct -= $request->totalAmount;
        $products->save();

        return back()->with('success', 'Product added to cart successfully!');
    }

    public function updateCon(Request $request)
    {
        // Check if there are any items in the cart
        $userId = Auth::id();
        $cartItems = Cart::where('customerID', $userId)->get();
        $request->validate([
            'terms' => 'required|accepted', // This will ensure the checkbox is checked
        ]);

        if ($cartItems->isEmpty()) {
            return back()->with('error', 'Your order is empty!');
        }
    
        // You can add payment processing logic here, if needed.
    
        // Assuming the order is successfully submitted
        return back()->with('success', 'Your order has been submitted successfully!');
    }
}
