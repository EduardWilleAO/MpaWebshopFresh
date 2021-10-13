<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;

class CartController extends Controller
{
    public function index(Request $request){
        $cart = new Cart($request);
        $products = $cart->getProducts($request);

        //$this->addToCart($request, 'Name');

        return view('cart', compact('products'));
    }

    public function addToCart(Request $request, $name){
        $cart = new Cart($request);
        $cart->addToCart($request, $name);

        return redirect('/cart');
    }
}
