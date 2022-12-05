<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

global $post;
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
        $products = $ProductObj->getProductData($id);
        $ProductNotIn = $ProductObj->productNotIn($id);

        // session()->put('view', $viewProduct);
        // session()->put('shop', $ProductNotIn);
        // $view = session()->get('view', []);

        return view('product-display',["products"=>$products, 'shop'=>$ProductNotIn]);
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
