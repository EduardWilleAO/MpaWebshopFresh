<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;

class CartController extends Controller
{
    public function index(Request $request){
        $cart = new Cart($request);
        $products = $cart->getProducts($request);
        $totalPrice = $cart->getTotalPrice($request);

        //$cart->clearCart($request);

        return view('cart', compact('products', 'totalPrice'));
    }

    public function addToCart(Request $request, $product, $userAmount){
        $cart = new Cart($request);

        foreach($product as $index){
            $cart->addToCart($request, $index->product_name, $index->img_url, $index->price, $userAmount);
        }
        /*foreach($product as $index){
            echo $index->product_name;
        }*/
    }

    public function updateAmount(Request $request){
        $name = $_POST['name'];
        $amount = $_POST['amount'];

        $cart = new Cart($request);
        if($amount === "0"){
            $cart->delete($request, $name);
        } else {
            $cart->updateAmount($request, $name, $amount);
        }
        
        return back();
    }
}
