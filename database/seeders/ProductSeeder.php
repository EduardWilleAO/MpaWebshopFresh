<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'product_name' => 'CyberPunk',
                'img_url' => 'https://wallpapercave.com/wp/wp8713067.jpg',
                'price' => 59.99,
                'category_id' => '1'
            ], [
                'product_name' => 'Farming Simulator',
                'img_url' => 'https://wallpaperaccess.com/full/4492588.jpg',
                'price' => 29.99,
                'category_id' => '1'
            ], [
                'product_name' => 'Forza Horizon',
                'img_url' => 'https://images.alphacoders.com/116/thumb-1920-1168382.jpg',
                'price' => 79.99,
                'category_id' => '1'
            ], [
                'product_name' => 'New World',
                'img_url' => 'https://wallpaperaccess.com/full/5710888.jpg',
                'price' => 59.99,
                'category_id' => '1'
            ], [
                'product_name' => 'Destiny 2',
                'img_url' => 'https://wallpaperaccess.com/full/27583.jpg',
                'price' => 69.99,
                'category_id' => '1'
            ], 
            
            //----Hardware Category----
            [
                'product_name' => 'Prebuilt Cooler Master Tower',
                'img_url' => 'https://cdn.mos.cms.futurecdn.net/hjjSKLDvY8Nvi4Ee8rXaUe.jpg',
                'price' => 2449.99,
                'category_id' => '2'
            ],[
                'product_name' => 'AOC UltraWide Monitor',
                'img_url' => 'https://assets.rockpapershotgun.com/images/2020/04/AOC-Agon-AG353UCG-1212x681.jpg',
                'price' => 611.99,
                'category_id' => '2'
            ],[
                'product_name' => 'I9 10900K CPU',
                'img_url' => 'https://wallpaperaccess.com/full/2018015.jpg',
                'price' => 899.99,
                'category_id' => '2'
            ],[
                'product_name' => 'Titan V GPU',
                'img_url' => 'https://pcper.com/wp-content/uploads/2017/12/de40-nvidia-titan-v-kv.jpeg',
                'price' => 2999.99,
                'category_id' => '2'
            ],[
                'product_name' => '3 Fan CPU Cooler',
                'img_url' => 'https://www.pcgamesn.com/wp-content/uploads/2018/08/Best-liquid-cooler.jpg',
                'price' => 349.99,
                'category_id' => '2'
            ], 
            
            //----Accessories Category----
            [
                'product_name' => 'Titan XL',
                'img_url' => 'https://cdn.mos.cms.futurecdn.net/qpYr7t6Abr8RVk4kc9njjF.jpg',
                'price' => 459.99,
                'category_id' => '3'
            ], [
                'product_name' => 'Corner Desk',
                'img_url' => 'https://images3.alphacoders.com/667/thumb-1920-667206.jpg',
                'price' => 199.99,
                'category_id' => '3'
            ], [
                'product_name' => 'Rode NT-USB',
                'img_url' => 'https://i.ytimg.com/vi/gA2qyn5nSTM/maxresdefault.jpg',
                'price' => 124.99,
                'category_id' => '3'
            ], [
                'product_name' => 'HyperX Cloud II',
                'img_url' => 'https://m.media-amazon.com/images/I/41wrkSuv7nL.jpg',
                'price' => 86.99,
                'category_id' => '3'
            ], [
                'product_name' => 'Logitech Speakers',
                'img_url' => 'https://cdn11.bigcommerce.com/s-sdw35vj9c2/images/stencil/1280x1280/products/39300/56168/980-000414z313_1__58702.1618450108.png?c=2',
                'price' => 149.99,
                'category_id' => '3'
            ], 
            
            //----Simulation Gear Category----
            [
                'product_name' => 'Valve Index',
                'img_url' => 'https://roadtovrlive-5ea0.kxcdn.com/wp-content/uploads/2019/04/valve-index-complete-kit-white.jpg',
                'price' => 1099.99,
                'category_id' => '4'
            ], [
                'product_name' => 'G923 Logitech',
                'img_url' => 'https://topgear.static-vds.nl/thumbs/hd/2020/08/logitech-g923-force-feedback-trueforce-2.jpg',
                'price' => 239.99,
                'category_id' => '4'
            ], [
                'product_name' => 'Logitech Gear Shifter',
                'img_url' => 'https://i.ytimg.com/vi/zMx2DkIUQhI/maxresdefault.jpg',
                'price' => 64.99,
                'category_id' => '4'
            ], [
                'product_name' => 'T-Flight Hotas One',
                'img_url' => 'https://m.media-amazon.com/images/I/51mG8mHbMOL.jpg',
                'price' => 76.99,
                'category_id' => '4'
            ], [
                'product_name' => 'Trustmaster Flight Yoke',
                'img_url' => 'https://jfk.static-vds.nl/2020/08/logitech-yoke.jpg',
                'price' => 159.99,
                'category_id' => '4'
            ], 

            //----Camping Gear Category----
            [ 
                'product_name' => 'Family Tent',
                'img_url' => 'https://familycamptents.com/wp-content/uploads/2019/10/Bushnell-Shield-Series-9-Person-Instant-Cabin-Tent-view.jpg',
                'price' => 4039.99,
                'category_id' => '5'
            ], [
                'product_name' => 'Camping Chair',
                'img_url' => 'https://cdn.mos.cms.futurecdn.net/7yUzX54535NkDBvWEeetCJ.jpg',
                'price' => 20.99,
                'category_id' => '5'
            ], [
                'product_name' => 'Travel Backpack',
                'img_url' => 'https://wallpaperaccess.com/full/1455386.jpg',
                'price' => 109.99,
                'category_id' => '5'
            ], [
                'product_name' => 'Fishing rod',
                'img_url' => 'https://wallpaperaccess.com/full/5074479.jpg',
                'price' => 159.99,
                'category_id' => '5'
            ], [
                'product_name' => 'Camping Stove',
                'img_url' => 'https://coresites-cdn-adm.imgix.net/outdoorsmagic/wp-content/uploads/2020/04/Stoves.jpg?fit=crop',
                'price' => 49.99,
                'category_id' => '5'
            ]
        ]);
    }
}
