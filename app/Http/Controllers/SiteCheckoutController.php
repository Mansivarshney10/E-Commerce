<?php

namespace App\Http\Controllers;
use Cart;

use App\Models\Orders;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

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
            'user_id'           => auth()->user()->id,
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
                // A better way will be to bring the product id with the cart items
                // you can explore the package documentation to send product id with the car

                $obj = new OrderItem(); 
                $obj->order_id=$order->id;
                $obj->product_id=$item['product_id'];
                $obj->quantity=$item['quantity'];
                $obj->price=$item['price'];
                $obj->save();
            }
        }
           
        session::flush();
        return redirect()->to('/')->with(['msg'=>'Your order has been placed successfully']);
    }
}

