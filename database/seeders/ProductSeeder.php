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
                'product_name' => 'Titan XL',
                'img_url' => 'https://cdn.mos.cms.futurecdn.net/qpYr7t6Abr8RVk4kc9njjF.jpg',
                'price' => 459.99,
                'category_id' => '2'
            ], [
                'product_name' => 'Corner Desk',
                'img_url' => 'https://images3.alphacoders.com/667/thumb-1920-667206.jpg',
                'price' => 199.99,
                'category_id' => '3'
            ], [
                'product_name' => 'Rode NT-USB',
                'img_url' => 'https://i.ytimg.com/vi/gA2qyn5nSTM/maxresdefault.jpg',
                'price' => 124.99,
                'category_id' => '4'
            ], [
                'product_name' => 'HyperX Cloud II',
                'img_url' => 'https://m.media-amazon.com/images/I/41wrkSuv7nL.jpg',
                'price' => 86.99,
                'category_id' => '5'
            ]
        ]);
    }
}
