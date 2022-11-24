<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    
    {
        $products = [
            [
                'name' => 'Samsung Galaxy',
                'description' => 'Samsung Brand',
                'image' => 'https://www.91-img.com/pictures/144219-v3-samsung-galaxy-s22-mobile-phone-large-1.jpg',
                'price' => 100
            ],
            [
                'name' => 'Apple iPhone 12',
                'description' => 'Apple Brand',
                'image' => 'https://www.91-img.com/pictures/136139-v4-apple-iphone-12-mobile-phone-large-1.jpg',
                'price' => 500
            ],
            [
                'name' => 'Google Pixel 2 XL',
                'description' => 'Google Pixel Brand',
                'image' => 'https://media.wired.co.uk/photos/606db7c789f3babb1f01428b/master/w_1600%2Cc_limit/phone_hero-module_hero-image_en_GB_1440_2x.png',
                'price' => 400
            ],
            [
                'name' => 'LG V10 H800',
                'description' => 'LG Brand',
                'image' => 'https://fdn2.gsmarena.com/vv/bigpic/lg-v10-new1.jpg',
                'price' => 200
            ]
        ];
  
        foreach ($products as $key => $value) {
            Product::create($value);
        }
    }
}
