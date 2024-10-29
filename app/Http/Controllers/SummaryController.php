<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Products; 
use App\Models\Orders;
use App\Models\orderDetails;
use App\Models\Rating;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ContinueRequest; 

class SummaryController extends Controller
{
    public function display_summary()
    {
        // Get the authenticated user's ID
        $userId = Auth::id();
        $Items = Orders::where('customerID', $userId)
                    ->with('products') 
                    ->with('rating')
                    ->get();
        return view('summary.display_summary',compact('Items'));
    }

    public function addToOrders(Request $request)
    {
        $request->validate([
            'terms' => 'accepted', 
        ]);

        $userId = Auth::id();

        $cartItems = Cart::where('customerID', $userId)
        ->with('product') 
        ->get(); // Use get() to retrieve all items
    
        DB::transaction(function () use ($cartItems, $userId) {
            // Loop through each cart item and attach to the order
            foreach ($cartItems as $cartItem) {
                $order = Orders::create([
                    'customerID' => $userId,
                    'date_time' => Carbon::now(), 
                ]);

                orderDetails::create([ 
                    'orderID' => $order->id, 
                    'productID' => $cartItem->productID, 
                    'quantity' => $cartItem->totalAmount, 
                    'totalPrice' => $cartItem->totalPrice,
                ]);
            }       
            DB::table('carts')->where('customerID', $userId)->delete();
        });
        
        return back()->with('success', 'Cart items added to orders successfully!');
    }
    

}