<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['order_id', 'user', 'product', 'product_amount'];

    /**
     * Runs function inside of the model Order.
     * This adds the item into the database if the cart is confirmed.
     */
    public function addProduct($request, $currentUser){
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

    public function getOrders($userId){
        return Order::where('user', $userId)->orderBy('order_id')->get();
    }
}
