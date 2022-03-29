<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Cart;

class OrderController extends Controller
{
    public function index(){
        $userId = $_POST['user'];

        $order = new Order();
        $orders = $order->getOrders($userId);

        return view('orders', ['orders' => $orders]);
    }

    /**
     * ConfirmCart is a function that takes the entire cart and stores the data in the database as completed order.
     */
    public function confirmOrder(Request $request){
        $userId = $_POST['user'];

        $order = new Order();
        $order->addProduct($request, $userId); //creates new order

        $cart = new Cart($request);
        $cart->clearCart($request);

        return back();
    }

    public function test(){
        $order = new Order();
        $order->test();
    }
}
