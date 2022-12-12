<?php

namespace App\Http\Controllers;
use Cart;

use App\Models\User;
use App\Models\Users;
use App\Models\Orders;
use App\Mail\Subscribe;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SiteCheckoutController extends Controller
{
    //
    /**
     * Display Check out page.
    */
    public function getCheckout() {
        return view('checkout');
    }

    /**
     * 1. Place Order
     * 2. Get Order Details in orders table
     * 3. Empty cart
     * 4. Send successfull order placed mail
    */
    public function placeOrder(Request $request){

        $item_count = 0;
        $price = 0.0;
        $quantity = 0;
        foreach (session()->get('cart', []) as $p){
            $price += $p['price']; 
            $quantity = $p['quantity'];
            $item_count++;
        }
        $total = $price * $quantity;
        $params = $request->all();

        $order = Orders::create([
            'order_number'      =>  'ORD-'.strtoupper(uniqid()),
            'user_id'           =>  auth()->user()->id,
            'status'            =>  'pending',
            'grand_total'       =>  $total,
            'item_count'        =>  $item_count,
            'payment_status'    =>  0,
            'payment_method'    =>  null,
            'first_name'        =>  $params['first_name'],
            'last_name'         =>  $params['last_name'],
            'address'           =>  $params['address'],
            'city'              =>  $params['city'],
            'country'           =>  $params['country'],
            'post_code'         =>  $params['post_code'],
            'phone_number'      =>  $params['phone_number'],
            'notes'             =>  $params['notes']
        ]);

        if ($order) {

            $items = session()->get('cart', []);
            
            foreach ($items as $item)
            {
                $obj = new OrderItem(); 
                $obj->order_id=$order->id;
                $obj->product_id=$item['product_id'];
                $obj->quantity=$item['quantity'];
                $obj->price=$item['price'];
                $obj->save();
            }
            
            $email = Auth::user()->email;
            $users = User::find([
                'email' => $email
            ]); 
            
            if ($users) {
                Mail::to($email)->send(new Subscribe($email));
                $request->session()->forget('cart');
                return redirect()->to('myorders')->withSuccess('Your order has been placed successfully');
            }
        }
    }
}

