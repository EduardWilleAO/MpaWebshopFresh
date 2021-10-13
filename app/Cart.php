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
}
