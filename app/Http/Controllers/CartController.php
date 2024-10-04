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

         $products = DB::table('carts')
         ->join('products','products.id','=','carts.productID')
         ->where('customerID',$userId)
         ->get();
         
         $subtotal = $cartItems->sum('totalPrice');
         
         // Set shipping cost
         $shipping = $cartItems->isEmpty() ? 0 : 10; 
         
         // Calculate total
         $total = $subtotal + $shipping;
 
         // Pass the data to the view
         return view('cart.display_cart', compact('subtotal', 'shipping', 'total','products'));
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

    public function deleteFromCart(Request $request)
    {
        $userId = Auth::id(); // Get the authenticated user's ID

        // Retrieve the cart item that is going to be deleted
        $cartItem = Cart::where('customerID', $userId)
            ->where('productID', $request->productID)
            ->first();

        // If the cart item exists, proceed
        if ($cartItem) {
            // Validate the requested quantity to delete
            $quantityToDelete = min($request->quantity, $cartItem->totalAmount); // Ensure we don't delete more than exists

            // Update the product's quantity in the products table by increasing it
            $product = Products::find($cartItem->productID);
            $product->increment('remainProduct', $quantityToDelete); // Increase the stock by the quantity to delete

            // Update the cart: if the cart has more than the deleted quantity, reduce it
            if ($cartItem->totalAmount > $quantityToDelete) {
                $cartItem->decrement('totalAmount', $quantityToDelete); // Reduce cart quantity
                $cartItem->totalPrice -= $product->price * $quantityToDelete; // Update the total price
                $cartItem->save();
            } else {
                // Otherwise, delete the cart item if we're deleting all of it
                $cartItem->delete();
            }
        }

        return back()->with('success', 'Item(s) deleted from cart and product stock updated successfully!');
    }



}
