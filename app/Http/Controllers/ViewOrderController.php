<?php

namespace App\Http\Controllers;
use App\Models\Orders;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;

class ViewOrderController extends Controller
{
    /**
     * Make sure the user is available
    */
    public function __construct() {
    // Middleware only applied to these methods
        $this->middleware('auth');
    }

    /**
     * Display Order Details for logged-in users
    */
    public function index() {
        if (Auth::check()) {
            // The user is logged in...
            $orders = Orders::where('user_id','=',Auth::user()->id)->get();

            // compact() to convert given variable to to array
            return view('my-orders', compact('orders'));
        }
    }
}
