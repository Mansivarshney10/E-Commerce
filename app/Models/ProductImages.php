<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    use HasFactory;
    protected $table = 'product_images';

    protected $fillable = [
        'product_id', 'images_1', 'images_2', 'images_3', 'images_4', 'images_5'
    ];
}
