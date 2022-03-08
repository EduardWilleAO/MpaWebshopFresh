<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Cart;

class CartController extends Controller
{
    /**
     * @param products retrieves all current items within the cart.
     * @param totalPrice uses total of items to calculate total price.
     */
    public function index(Request $request){
        $cart = new Cart($request);
        $products = $cart->getProducts($request);
        $totalPrice = $cart->getTotalPrice($request);

        return view('cart', compact('products', 'totalPrice'));
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
        $order = new Order();
        $order->addProduct($request, $_POST['user']);

        return back();
    }
}
