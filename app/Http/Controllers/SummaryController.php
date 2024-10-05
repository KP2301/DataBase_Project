<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Products; 
use App\Models\Orders;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ContinueRequest; // Include the ContinueRequest

class SummaryController extends Controller
{
    public function display_summary()
    {
        // Get the authenticated user's ID
        $userId = Auth::id();
        $Items = DB::table('orders')
        ->join('products','products.id','=','orders.productID')
        ->where('customerID',$userId)
        ->get();
        return view('summary.display_summary',compact('Items'));
    }

    public function addToOrders(Request $request)
    {
        $request->validate([
            'terms' => 'accepted', // The 'accepted' rule requires the checkbox to be checked
        ]);

        $userId = Auth::id();
    
        // Get all cart items for the authenticated user
        $cartItems = DB::table('carts')
            ->join('products', 'products.id', '=', 'carts.productID')
            ->where('customerID', $userId)
            ->get();
    
        DB::transaction(function () use ($cartItems, $userId) {
            foreach ($cartItems as $cartItem) {
                Orders::create([
                    'customerID' => $userId,
                    'productID' => $cartItem->productID,
                    'quantity' => $cartItem->totalAmount,
                    'totalPrice' => $cartItem->totalPrice,
                    'date_time' => Carbon::now(),
                ]);
            }
            DB::table('carts')->where('customerID', $userId)->delete();
        });
        
        return back()->with('success', 'Cart items added to orders successfully!');
    }
    

}