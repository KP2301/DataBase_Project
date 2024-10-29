<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Products; 
use Illuminate\Support\Facades\DB;
use App\Models\Rating;

class ProductController extends Controller
{
    public function display_product()
    {
        $userId = Auth::id(); // Get the authenticated user's ID
        $products = Products::paginate(8);
        return view("display_product",compact('products'));
    }

    public function rateProduct(Request $request) {
        
        $request->validate([
            'productID' => 'required|exists:products,id',
           'rating' => 'required|integer|min:1|max:5',
           'orderID' => 'required|exists:orders,id',
        ]);
        // Get the current authenticated user ID
        $userId = Auth::id();

        // Check if a rating already exists for this user, product, and order
        $existingRating = Rating::where('customerID', $userId)
                                ->where('productID', $request->input('productID'))
                                ->where('orderID', $request->input('orderID'))
                                ->first();

        if ($existingRating) {
            // Update the existing rating
            $existingRating->update([
                'star' => $request->input('rating'),
            ]);
            $message = 'Rating updated successfully!';
        } else {
            // Create a new rating if it doesn't exist
            Rating::create([
                'customerID' => $userId,
                'productID' => $request->input('productID'),
                'orderID' => $request->input('orderID'),
                'star' => $request->input('rating'),
            ]);
            $message = 'Product rated successfully!';
        }

        return redirect()->back()->with('success', $message);
    }
}
