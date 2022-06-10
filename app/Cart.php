<?php

namespace App;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;

class Cart
{
    private $products = [];

    /**
     * If check to see whether to use existing session or to create a new one.
     */
    public function __construct($request){
        if($request->session()->has('products')){
            $this->products = $request->session()->get('products');
        } else{
            $this->products = [];
        }
    }

    public function getProducts(){
        return $this->products;
    }

    /**
     * Gets all products.
     * Create @param prevPrice, this will be used to take current price of products and add new one on top. 
     * 
     * Check if the session is filled.
     * Loop through all the items in cart.
     * 
     * @param currPrice is a singular items price.
     * @param totalPrice is the price of one item * the amount of the same items in the cart.
     */
    public function getTotalPrice(){
        $products = $this->products;
        $prevPrice;

        if($products){
            foreach($products as $product){
                $currPrice = $product->price;
                $totalPrice = $currPrice * $product->amount;

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
     * @param products is everything in the session.
     * 
     * if @param products exists, look for the item that you're trying to add.
     *      if itemname exists in the session, simply update amount.
     *      if itemname doesn't exist in session, add whole item into array.
     * 
     * else the session is completely empty and it just pushes the product into the session.
     */
    public function addToCart($product, $userAmount){
        //$obj = $request->session()->get('products');
        $products = $this->products;

        if($products){
            $find = array_search($product->product_name, array_column($products, 'product_name'));

            if($find !== false){
                $products[$find]->amount = $products[$find]->amount + $userAmount;
            }
            else{
                $product->amount = $userAmount;
                array_push($this->products, $product);
            }
        } else{
            $product->amount = $userAmount;
            array_push($this->products, $product);
        }        
    }

    /**
     * Function to change the amount of the item in cart.
     * Just takes the given amount and overwrites the old amount.
     */
    public function updateAmount($name, $amount){
        //$obj = $request->session()->get('products');
        $products = $this->products;

        foreach($products as $product){
            if($product->product_name == $name){
                $product->amount = $amount;
            }
        }
    }

    /**
     * @param obj get all items in cart.
     * loop through the whole cart.
     * if current itemname is the same as item name in parameter.
     * unset the item on current foreach index.
     */
    public function delete($name){    
        $products = $this->products;
        
        foreach($products as $product=>$key){
            if($key->product_name == $name){
                unset($products[$product]);
                $this->products = $products;
            }
        }
    }

    public function saveSession($request){
        $currentSession = $this->products;
        $oldSession = $request->session()->get('products');

        $request->session()->forget('products');

        foreach($currentSession as $item){
            $request->session()->push('products', $item);
        }
    }

    public function clearCart($request){
        $request->session()->forget('products');
    }
}
