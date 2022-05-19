<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Cart;

class CartController extends Controller
{
    /**
     * @param products retrieves all current items within the cart.
     * @param totalPrice uses total of items to calculate total price.
     */
    public function index(Request $request){
        $cart = new Cart($request);
        $products = $cart->getProducts();
        $totalPrice = $cart->getTotalPrice();

        return view('cart', compact('products', 'totalPrice'));
    }

    /**
     * Gets a singular product, 
     * this retrieved product will be sent to cart controller to add it to the cart session.
     */
    public function addToCart(Request $request){
        $id = $_POST['id'];
        $userAmount = $_POST['amount'];

        $product = Product::where('id', $id)->get();

        $cart = new Cart($request);

        foreach($product as $index){
            $cart->addToCart($index, $userAmount);
        }

        $cart->saveSession($request);
        
        return back();
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
            $cart->delete($name);
        } else {
            $cart->updateAmount($name, $amount);
        }

        $cart->saveSession($request);
        
        return back();
    }
}
