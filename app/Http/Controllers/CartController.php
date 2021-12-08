<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;

class CartController extends Controller
{
    /**
     * Display function
     * Gets all products and calculates the price for all items in the cart
     */
    public function index(Request $request){
        $cart = new Cart($request);
        $products = $cart->getProducts($request);
        $totalPrice = $cart->getTotalPrice($request);

        return view('cart', compact('products', 'totalPrice'));
    }

    /**
     * addToCart, function ran from product controller
     * 
     * Adds a given item to the cart session.
     */
    public function addToCart(Request $request, $product, $userAmount){
        $cart = new Cart($request);

        foreach($product as $index){
            $cart->addToCart($request, $index->product_name, $index->img_url, $index->price, $userAmount);
        }
    }

    /**
     * Two if checks,
     *  if -> the given amount is 0, remove the current item
     *  else -> Updates the amount for the item
     */
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

    /**
     * ConfirmCart is a function that takes the entire cart and stores the data in the database as completed order.
     */
    public function confirmOrder(Request $request){
        $cart = new Cart($request);
        $cart->confirmCart($request, $_POST['user']);

        return back();
    }
}
