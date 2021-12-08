<?php

namespace App;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\arrObj;

class Cart
{
    private $products;

    /**
     * If check to see wether to use existing session or to create a new one.
     */
    public function __construct($request){
        if($request->session()->has('products')){
            $this->products = $request->session()->get('products');
        } else{
            $this->products = NULL;
        }
    }

    public function getProducts($request){
        return $this->products;
    }

    /**
     * Function that calculates the total price of all products in the session.
     */
    public function getTotalPrice($request){
        $obj = $request->session()->get('products');
        $prevPrice;

        if($obj){
            foreach($obj as $index){
                $currPrice = $index->price;
                $totalPrice = $currPrice * $index->amount;

                if(isset($prevPrice)) $prevPrice = $prevPrice + $totalPrice;
                else $prevPrice = $totalPrice;
            }
        } else {
            $prevPrice = 0;
        }

        $prevPrice = number_format($prevPrice, 2);

        return $prevPrice;
    }

    /**
     * if $obj exists, look for the item that you're trying to add.
     *      if an item with the same name as parameter name exists -> update amount
     *      if no item with the same name exists, add it with the given amount
     * 
     * else the session is completely empty and it just pushes the product into the session.
     */
    public function addToCart($request, $name, $img_url, $price, $userAmount){
        $obj = $request->session()->get('products'); // get all products

        if($obj != null) {
            $find = array_search($name, array_column($obj, 'name'));

            if($find !== false){
                $obj[$find]->amount = $obj[$find]->amount + $userAmount;
            } else {
                $amount = $userAmount;
                
                $arr = new arrObj($name, $img_url, $price, $amount);
                $request->session()->push('products', $arr);
            }
        } else {
            $amount = $userAmount;
            
            $arr = new arrObj($name, $img_url, $price, $amount);
            $request->session()->push('products', $arr);
        }
    }

    public function updateAmount($request, $name, $amount){
        $obj = $request->session()->get('products');

        foreach($obj as $index){
            if($index->name == $name){
                $index->amount = $amount;
            }
        }
    }

    public function delete($request, $name){    
        $obj =  $request->session()->get('products');   
        
        foreach($obj as $index=>$key){
            if($key->name == $name){
                unset($obj[$index]);
                $request->session()->put('products', $obj);
            }
        }
    }

    public function clearCart($request){
        $request->session()->flush();
    }

    /**
     * Runs function inside of the model Order.
     * This adds the item into the database if the cart is confirmed.
     */
    public function confirmCart($request, $user){
        $obj = $request->session()->get('products');
        $order = new Order();

        if($obj) $order->addProduct($user, $obj);

        return back();
    }
}
