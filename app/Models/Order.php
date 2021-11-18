<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['order_id', 'user', 'product', 'product_amount'];

    public function addProduct($currentUser, $obj){
        $currTable = Order::all();
        $order_id = 1;

        foreach ($currTable as $key) {
            if($key) {
                $newObj = collect($currTable)->sortByDesc('order_id')->first();
                $order_id = ($newObj->order_id + 1);
            }
        }

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
        return Order::all()->where('user', $userId);
    }
}
