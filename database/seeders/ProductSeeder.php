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
                'img_url' => '#',
                'price' => 59.99,
                'category_id' => '1'
            ], [
                'product_name' => 'Titan XL',
                'img_url' => '#',
                'price' => 459.99,
                'category_id' => '2'
            ], [
                'product_name' => 'Corner Desk',
                'img_url' => '#',
                'price' => 199.99,
                'category_id' => '3'
            ], [
                'product_name' => 'Rode NT-USB',
                'img_url' => '#',
                'price' => 124.99,
                'category_id' => '4'
            ], [
                'product_name' => 'HyperX Cloud II',
                'img_url' => '#',
                'price' => 86.99,
                'category_id' => '5'
            ]
        ]);
    }
}
