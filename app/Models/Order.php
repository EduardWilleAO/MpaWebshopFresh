<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderProduct;
use App\Cart;

class Order extends Model
{
    protected $fillable = ['user'];
    /**
     * Runs function inside of the model Order.
     * This adds the item into the database if the cart is confirmed.
     */
    public function addProductOLD($request, $currentUser){
        $currSession = $request->session()->get('products');
        if(!$currSession) return; //if session is empty, cancel and go back to cart page.

        $currTable = Order::all()->where('user', $currentUser);   
        $order_id = 1;

        /**
         * This foreach gets the entire order, so $newObj is "order1" or "order2",
         * This doesnt include specific items within orders. This is so the order indexes work out properly
         * 
         * $newObj gets the highest orderId from table, then adds one which will be used as the new orders id
         */
        foreach ($currTable as $key) {
            if($key) {
                $newObj = collect($currTable)->sortByDesc('order_id')->first();
                $order_id = ($newObj->order_id + 1);
            }
        }

        /**
         * Adds object into the database
         */
        foreach ($currSession as $product) {
            $this->create([
                'order_id' => $order_id,
                'user' => $currentUser,
                'product' => $product->product_name,
                'product_amount' => $product->amount
            ]);
        }
    }

    public function addProduct($request, $currentUser){
        $this->create(['user' => $currentUser]);

        /**
         * Gets the last order belonging to the current user
         */
        $order = $this::all()->where('user', $currentUser)->last();
        
        //get cart content
        $cart = new Cart($request);
        $products = $cart->getProducts($request);

        $orderProduct = new OrderProduct();

        foreach($products as $product){
            $orderprod = OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'amount' => 1
            ]);
        }
    }

    public function getOrders($userId){
        return Order::where('user', $userId)->orderBy('order_id')->get();
    }

    /**
     * Generate order in order table.
     */
    public function test(){
        dd($this);
    }
}
