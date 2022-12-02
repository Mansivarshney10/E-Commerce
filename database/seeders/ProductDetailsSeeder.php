<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductDetails;

class ProductDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $productDetails = [
            [
                'product_id' => 1,
                'discount' => 15,
                'stars' => 4,
                'os' => 'Android 12.0',
                'cellular technology' => '5G',
                'memory storage' => '128 GB',
            ],
            [
                'product_id' => 2,
                'discount' => 15,
                'stars' => 4,
                'os' => 'IOS',
                'cellular technology' => '5G',
                'memory storage' => '64 GB',
            ],
            [
                'product_id' => 3,
                'discount' => 15,
                'stars' => 4,
                'os' => 'Android 13.0',
                'cellular technology' => '5G',
                'memory storage' => ' 64 GB',
            ],
            [
                'product_id' => 4,
                'discount' => 15,
                'stars' => 4,
                'os' => 'Android 12.0',
                'cellular technology' => '5G',
                'memory storage' => '64 GB',
            ],
        ];

        foreach ($productDetails as $key => $value) {
            ProductDetails::create($value);
        }
    }
}
