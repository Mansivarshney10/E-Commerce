<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    
}
