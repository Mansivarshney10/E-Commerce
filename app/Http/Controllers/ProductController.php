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
        return redirect()->back()->with('success', 'Product added to cart successfully!'); // Back() used to create a redirect response to the user's previous location
        
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
        // $request object-oriented way to interact with the current HTTP request being handled by your application
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
        // $request object-oriented way to interact with the current HTTP request being handled by your application
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]); // unset() destroys the specified variables.
                session()->put('cart', $cart); // Update Session.
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

}
