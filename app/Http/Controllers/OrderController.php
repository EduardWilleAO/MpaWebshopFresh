<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){
        $order = new Order();
        $orders = $order->getOrders();
        
        return view('orders', ['orders' => $orders]);
    }
}
