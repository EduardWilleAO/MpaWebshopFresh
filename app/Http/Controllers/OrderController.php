<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){
        $userId = $_POST['user'];

        $order = new Order();
        $orders = $order->getOrders($userId);

        return view('orders', ['orders' => $orders]);
    }
}
