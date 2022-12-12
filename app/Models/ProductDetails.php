<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    /**
     * It is a trait that links a Eloquent model to a model factory
    */
    use HasFactory;

    protected $table = 'product_details';

    protected $fillable = [
        'product_id', 'discount', 'stars', 'os', 'cellular technology', 'memory storage',
    ];

}
