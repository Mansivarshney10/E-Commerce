<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDescription extends Model
{
    /**
     * It is a trait that links a Eloquent model to a model factory
     */
    use HasFactory;

    protected $table = 'product_description';

    protected $fillable = [
        'product_id', 'point_1', 'point_2', 'point_3', 'point_4', 'point_5', 'point_6', 'point_7', 'point_8'
    ];

}
