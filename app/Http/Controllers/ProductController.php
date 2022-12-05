<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{ 
    public function index()
    {
        $ProductObj = new Product;
        $productList = $ProductObj->getProductList();
        return view('products',["products"=>$productList]);
    }

    public function cart()
    {
        return view('cart');
    }

    public function addToCart($id)
    {
        
        $ProductObj = new Product;
        $product = $ProductObj->getCartList($id);
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product['name'],
                "product_id" => $product['id'],
                "quantity" => 1,
                "price" => $product['price'],
                "image" => $product['image']
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
        
    }

    public function viewProduct($id)
    {
        $ProductObj = new Product;
        $viewPproduct = $ProductObj->getProductData($id);

        session()->put('view', $viewPproduct);
        $view = session()->get('view', []);

        return view('product-display',["products"=>$view]);
    }
    
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}
