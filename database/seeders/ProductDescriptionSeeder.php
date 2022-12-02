<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductDescription;

class ProductDescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $productDescription = [
            [
                'product_id' => 1,
                'point_1' => 'Make nights epic with Nightography',
                'point_2' => 'VisionBooster outshines the sun',
                'point_3' => '4nm processor, our fastest chip yet',
                'point_4' => 'Smooth Video gives you all the smooth moves',
                'point_5' => 'Google Duo Live Sharing for virtual watch parties',
                'point_6' => 'Fast charge that outlasts the day',
                'point_7' => 'Auto Data Switching, Upto 12GB RAM with RAM Plus, Octa Core Processor, Fingerprint Sensor',
                'point_8' => '1 Lithium Ion batteries required. (included)'
            ],
            [
                'product_id' => 2,
                'point_1' => '6.1-inch (15.5 cm diagonal) Super Retina XDR display',
                'point_2' => 'Ceramic Shield, tougher than any smartphone glass',
                'point_3' => 'A14 Bionic chip, the fastest chip ever in a smartphone',
                'point_4' => 'Advanced dual-camera system with 12MP Ultra Wide and Wide cameras; Night mode,    Deep Fusion, Smart HDR 3, 4K Dolby Vision HDR recording',
                'point_5' => '12MP TrueDepth front camera with Night mode, 4K Dolby Vision HDR recording',
                'point_6' => 'Industry-leading IP68 water resistance',
                'point_7' => 'Supports MagSafe accessories for easy attach and faster wireless charging',
                'point_8' => 'iOS with redesigned widgets on the Home screen, all-new App Library, App Clips and more'
            ],
            [
                'product_id' => 3,
                'point_1' => '12.2MP primary camera and 8MP front facing camera',
                'point_2' => '15.24 centimeters (6-inch) capacitive touchscreen with 1440 x 2880 pixels resolution',
                'point_3' => 'Android v8.0.1 Oreo operating system with 2.35GHz Qualcomm Snapdragon 835 64-bit octa core processor, 4GB RAM, 64GB internal memory and single SIM',
                'point_4' => '3520mAH lithium-ion battery',
                'point_5' => '1 year manufacturer warranty for device and 6 months manufacturer warranty for in-box accessories including batteries from the date of purchase',
                'point_6' => '6 Inch Display',
                'point_7' => 'Snapdragon Octa Core Processor',
                'point_8' => '64 GB Internal Storage'
            ],
            [
                'product_id' => 4,
                'point_1' => '5.7 inches 1440 x 2560 pixels (~515 ppi pixel density), Secondary display, 160 x 1040 pixels, 2.1 inches, Fingerprint Sensor (rear-mounted)',
                'point_2' => '64 GB ROM (~50GB after OS), 4GB RAM, microSD, up to 256 GB (dedicated slot) ,CPU Snapdragon 808 Hexa-core 1.2 GHz',
                'point_3' => '16 MP, f/1.8, laser autofocus, 5 MP Front Camera, Android OS, v5.1.1',
                'point_4' => '4G LTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 12(700), 29(700), 30(2300) 3G bands HSDPA 850 / 1700(AWS) / 1900 / 2100',
                'point_5' => 'AT&T Unlocked Phone compatible with GSM SIM cards in U.S. and worldwide Including AT&T, T-Mobile, MetroPCS, Etc. Does not have US warranty. Will NOT work with CDMA Carriers Such as Verizon, Sprint, Boost.',
                'point_6' => 'Secondary Screen, Finger Print Sensor',
                'point_7' => '1 Lithium Ion batteries required.',
                'point_8' => '64GB + 4GB RAM'
            ],
        ];

        foreach ($productDescription as $key => $value) {
            ProductDescription::create($value);
        }
    }
}
