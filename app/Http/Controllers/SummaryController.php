<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart; 
use Illuminate\Support\Facades\DB;

class SummaryController extends Controller
{
    public function display_summary()
    {
        $userId = Auth::id(); // Get the authenticated user's ID
        return view("summary.display_summary");
    }
}
