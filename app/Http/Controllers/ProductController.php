<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProductController extends Controller
{ 
    /**
     * Show all products on the shop page
    */
    public function index()
    {
        $ProductObj = new Product;
        $productList = $ProductObj->getProductList();
        return view('products',["products"=>$productList]);
    }

    /**
     * Display Products in Cart
    */
    public function cart()
    {
        return view('cart');
    }

    /**
     * Add-to-cart Post-function
    */
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

    /**
     * Display other available products in the product-display
    */
    public function viewProduct($id)
    {
        $ProductObj = new Product;
        $products = $ProductObj->getProductData($id);
        $ProductNotIn = $ProductObj->productNotIn($id);

        return view('product-display',["products"=>$products, 'shop'=>$ProductNotIn]);
    }
    
    /**
     * Quantity should be updated if there is already a product card
    */
    public function update(Request $request)
    {
        // PHP super global variable which is used to collect data after submitting an HTML form
        if($request->id && $request->quantity){     
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    /**
     * Remove product
    */
    public function remove(Request $request)
    {
        // PHP super global variable which is used to collect data after submitting an HTML form
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
