<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Cart;

class OrderController extends Controller
{
    public function getOrders(){
        $userId = $_POST['user'];

        $order = new Order();
        $orders = Order::where('user', $userId)->get();

        return view('orders', compact('orders'));
    }

    /**
     * ConfirmCart is a function that takes the entire cart and stores the data in the database as completed order.
     */
    public function confirmOrder(Request $request){
        $userId = $_POST['user'];

        $order = new Order();
        $order->confirmOrder($request, $userId); //creates new order

        $cart = new Cart($request);
        $cart->clearCart($request);

        return back();
    }
}
