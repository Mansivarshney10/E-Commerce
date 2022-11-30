<?php

namespace App\Http\Controllers;
use Cart;

use App\Models\Orders;
use App\Models\Users;
use App\Mail\Subscribe;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SiteCheckoutController extends Controller
{
    //
    public function getCheckout() {
        return view('checkout');
    }

    public function placeOrder(Request $request){

        $item_count = 0;
        $price = 0.0;
        foreach (session()->get('cart', []) as $p){
            $price += $p['price']; 
            $item_count++;
        }
        $params = $request->all();

        $order = Orders::create([
            'order_number'      =>  'ORD-'.strtoupper(uniqid()),
            'user_id'           =>  auth()->user()->id,
            'status'            =>  'pending',
            'grand_total'       =>  $price,
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
                $request->session()->forget('cart');  // 'cart', $cart
                // session::flush();
                return redirect()->to('myorders')->withSuccess('Your order has been placed successfully');
            }
        }
           
        // return redirect()->to('/')->with(['msg'=>'Your order has been placed successfully']);
    }
}

