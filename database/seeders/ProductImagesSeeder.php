<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductImages;

class ProductImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $productImages = [
            [
                'product_id' => 1,
                'images_1' => 'https://d2d22nphq0yz8t.cloudfront.net/88e6cc4b-eaa1-4053-af65-563d88ba8b26/https://media.croma.com/image/upload/v1662439111/Croma%20Assets/Communication/Mobiles/Images/248900_ymwsiq.png/mxw_2256,f_auto',
                'images_2' => 'https://images.samsung.com/is/image/samsung/p6pim/in/2202/gallery/in-galaxy-s22-s901-412948-sm-s901ezkdinu-530964643?$684_547_PNG$',
                'images_3' => 'https://images.samsung.com/is/image/samsung/p6pim/in/2202/gallery/in-galaxy-s22-s901-412948-sm-s901ezkdinu-thumb-530964652?$86_56_PNG$',
                'images_4' => 'https://images.samsung.com/is/image/samsung/p6pim/in/2202/gallery/in-galaxy-s22-s901-412948-sm-s901ezkdinu-thumb-530964654?$86_56_PNG$',
                'images_5' => 'https://images.samsung.com/is/image/samsung/p6pim/in/2202/gallery/in-galaxy-s22-s901-412948-sm-s901ezkdinu-thumb-530964656?$86_56_PNG$'
            ],
            [
                'product_id' => 2,
                'images_1' => 'https://shop.unicornstore.in/uploads/images/medium/4333b9f1baffc74d1e2f1976a1d1c1a1.jpg',
                'images_2' => 'https://cdn.shopify.com/s/files/1/0568/5942/7015/products/MGJ53HN_A_1.png?v=1631166537',
                'images_3' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRMTyqBIioJ1AZsvl2JCMF7Gubso1GXlnT3Aa0SGifv8QmyU8MDLCbZ_KXrgA7-5d91uLE&usqp=CAU',
                'images_4' => 'https://cdn.shopify.com/s/files/1/0650/4044/9786/products/apple_iphone_12_black_back_512x.jpg?v=1664896182',
                'images_5' => 'https://cdn.shopify.com/s/files/1/0083/6380/2720/products/black_e467d100-f7ae-44f6-b537-75616a22558e_1024x1024@2x.png?v=1656510745'
            ],
            [
                'product_id' => 3,
                'images_1' => 'https://img6.gadgetsnow.com/gd/images/products/additional/large/G84273_View_1/mobiles/smartphones/google-pixel-3-64-gb-just-black-4-gb-ram-.jpg',
                'images_2' => 'https://img5.gadgetsnow.com/gd/images/products/additional/large/G84273_View_2/mobiles/smartphones/google-pixel-3-64-gb-just-black-4-gb-ram-.jpg',
                'images_3' => 'https://img2.gadgetsnow.com/gd/images/products/additional/large/G84273_View_3/mobiles/smartphones/google-pixel-3-64-gb-just-black-4-gb-ram-.jpg',
                'images_4' => 'https://img6.gadgetsnow.com/gd/images/products/additional/large/G84273_View_7/mobiles/smartphones/google-pixel-3-64-gb-just-black-4-gb-ram-.jpg',
                'images_5' => 'https://img4.gadgetsnow.com/gd/images/products/additional/large/G84273_View_5/mobiles/smartphones/google-pixel-3-64-gb-just-black-4-gb-ram-.jpg'
            ],
            [
                'product_id' => 4,
                'images_1' => 'https://www.lg.com/us/images/cell-phones/md05230807/gallery/medium01.jpg',
                'images_2' => 'https://www.lg.com/us/images/cell-phones/md05230807/gallery/medium02.jpg',
                'images_3' => 'https://www.lg.com/us/images/cell-phones/md05230807/gallery/medium03.jpg',
                'images_4' => 'https://www.lg.com/us/images/cell-phones/md05230807/gallery/large09.jpg',
                'images_5' => 'https://www.lg.com/us/images/cell-phones/md05230807/gallery/large10.jpg'
            ]
        ];

        foreach ($productImages as $key => $value) {
            ProductImages::create($value);
        }
    }
}
