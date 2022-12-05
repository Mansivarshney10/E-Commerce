<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Response;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'description', 'image'
    ];


    public function getProductList(){

        $product = $this->all();

        $returnData = $this->arrangeData($product);
        return $returnData;
    }

    public function arrangeData($data){

        $returnData = array();

        foreach($data as $key=>$value){
            $returnData[] = $value->attributes;
        }

        return $returnData;
    }

    public function getCartList($id){

        $product = Product::find($id);
        return $product;

    }

    public function getProductData($id){

        $product = Product::find($id)->toArray();
        $product['productDetails'] = ProductDetails::where('id', '=', $id)->get()->toArray();
        $product['productDescription'] = ProductDescription::where('id', '=', $id)->get()->toArray();
        // echo '<pre>';print_r($product);die;
        // $array = array_merge($product->toArray(), $productDetails->toArray(), $productDescription->toArray());
        return $product;

        // dd(Response::json($array));
    }

}
