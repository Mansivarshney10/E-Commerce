<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Orders;
use App\Models\Product;
use App\Models\OrderItem;


use Illuminate\Http\Request;

class ViewOrderController extends Controller
{
    public function __construct() {
    // Middleware only applied to these methods
        $this->middleware('auth');
    }

    public function index() {
        if (Auth::check()) {
            // The user is logged in...
            $orders = Orders::where('user_id','=',Auth::user()->id)->get();
            return view('my-orders', compact('orders'));
        }
    }
}
