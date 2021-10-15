<?php

namespace App;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\arrObj;

class Cart
{
    //get products function
    private $products;

    public function __construct($request){
        //if request has products, else lege array in products
        if($request->session()->has('products')){
            $this->products = $request->session()->get('products');
        } else{
            $this->products = NULL;
        }
    }

    public function getProducts($request){
        return $this->products;
    }

    public function getTotalPrice($request){
        $obj = $request->session()->get('products');
        $prevPrice;

        foreach($obj as $index){
            $currPrice = $index->price;
            $totalPrice = $currPrice * $index->amount;

            if(isset($prevPrice)) $prevPrice = $prevPrice + $totalPrice;
            else $prevPrice = $totalPrice;
        }

        return $prevPrice;
    }

    public function addToCart($request, $name, $price){
        $obj = $request->session()->get('products'); // get all products

        if($obj != null) { // if obj is empty, then just add item
            $find = array_search($name, array_column($obj, 'name'));

            if($find !== false){
                $obj[$find]->amount = $obj[$find]->amount + 1;
            } else {
                $amount = 1;
                
                $arr = new arrObj($name, $price, $amount);
                $request->session()->push('products', $arr);
            }
        } else {
            $amount = 1;
            
            $arr = new arrObj($name, $price, $amount);
            $request->session()->push('products', $arr);
        }
    }

    public function clearCart($request){
        $request->session()->flush();
    }
}
