<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['order_id', 'user', 'product', 'product_amount'];

    public function addProduct($currentUser, $obj){
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
        foreach ($obj as $product) {
            $this->create([
                'order_id' => $order_id,
                'user' => $currentUser,
                'product' => $product->name,
                'product_amount' => $product->amount
            ]);
        }
    }

    public function getOrders($userId){
        return Order::where('user', $userId)->orderBy('order_id')->get();
    }
}
