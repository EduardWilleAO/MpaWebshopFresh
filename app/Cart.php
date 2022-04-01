<?php

namespace App;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;

class Cart
{
    private $products;

    /**
     * If check to see whether to use existing session or to create a new one.
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
     * Gets all products.
     * Create @param prevPrice, this will be used to take current price of products and add new one on top. 
     * 
     * Check if the session is filled.
     * Loop through all the items in cart.
     * 
     * @param currPrice is a singular items price.
     * @param totalPrice is the price of one item * the amount of the same items in the cart.
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
     * @param obj is everything in the session.
     * 
     * if @param obj exists, look for the item that you're trying to add.
     *      if itemname exists in the session, simply update amount.
     *      if itemname doesn't exist in session, add whole item into array.
     * 
     * else the session is completely empty and it just pushes the product into the session.
     */
    public function addToCart($request, $product, $userAmount){
        $obj = $request->session()->get('products');

        if($obj){
            $find = array_search($product->product_name, array_column($obj, 'product_name'));

            if($find !== false){
                $obj[$find]->amount = $obj[$find]->amount + $userAmount;
            }
            else{
                $product->amount = $userAmount;
                $request->session()->push('products', $product);
            }
        } else{
            $product->amount = $userAmount;
            $request->session()->push('products', $product);
        }        
    }

    /**
     * Function to change the amount of the item in cart.
     * Just takes the given amount and overwrites the old amount.
     */
    public function updateAmount($request, $name, $amount){
        $obj = $request->session()->get('products');

        foreach($obj as $index){
            if($index->product_name == $name){
                $index->amount = $amount;
            }
        }
    }

    /**
     * @param obj get all items in cart.
     * loop through the whole cart.
     * if current itemname is the same as item name in parameter.
     * unset the item on current foreach index.
     */
    public function delete($request, $name){    
        $obj =  $request->session()->get('products');
        
        foreach($obj as $index=>$key){
            if($key->product_name == $name){
                unset($obj[$index]);
                $request->session()->put('products', $obj);
            }
        }
    }

    public function clearCart($request){
        $request->session()->forget('products');
    }
}
