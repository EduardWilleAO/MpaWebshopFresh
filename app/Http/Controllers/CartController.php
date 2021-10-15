<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;

class CartController extends Controller
{
    public function index(Request $request){
        $cart = new Cart($request);
        $products = $cart->getProducts($request);

        /*$this->addToCart($request, 'Product 1');
        $this->addToCart($request, 'Product 2');
        $this->addToCart($request, 'Product 3');
        $this->addToCart($request, 'Product 4');
        $this->addToCart($request, 'Product 5');
        $this->addToCart($request, 'Product 6');
        $this->addToCart($request, 'Product 7');
        $this->addToCart($request, 'Product 8');
        $this->addToCart($request, 'Product 9');
        $this->addToCart($request, 'Product 10');
        $this->addToCart($request, 'Product 11');
        $this->addToCart($request, 'Product 12');
        $this->addToCart($request, 'Product 13');
        $this->addToCart($request, 'Product 14');
        $this->addToCart($request, 'Product 15');*/

        //$cart->clearCart($request);

        return view('cart', compact('products'));
    }

    public function addToCart(Request $request, $product){
        $cart = new Cart($request);

        foreach($product as $index){
            $cart->addToCart($request, $index->product_name, $index->price);
        }
        /*foreach($product as $index){
            echo $index->product_name;
        }*/
    }
}
