<?php

namespace App;

use App\Http\Controllers\Controller;
use App\Models\User;

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

    public function addToCart($request, $name){
        //when item is added in cart, check if exists, if true, add count instead of adding to array (make products in the array objects)
        $request->session()->push('products', $name);
    }

    public function clearCart($request){
        $request->session()->flush();
    }
}
