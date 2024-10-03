<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Products; 
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ContinueRequest; // Include the ContinueRequest

class SummaryController extends Controller
{
    public function display_summary()
    {
        // Get the authenticated user's ID
        $userId = Auth::id();
        return view('summary.display_summary');
    
}

}