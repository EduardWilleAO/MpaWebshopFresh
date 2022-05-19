<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderProduct;
use App\Cart;

class Order extends Model
{
    protected $fillable = ['user'];

    /**
     * Generate a many to many relationship between product and order.
     * WithPivot is so that the "amount" column from the database will also be accesible.
     */
    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('amount');
    }

    /**
     * Creates a new order listing in the database.
     * 
     * Get last order from specific user.
     * Get all products from cart(session).
     * 
     * Push into the pivot table:
     *  order_id
     *  product_id
     */
    public function confirmOrder($request, $currentUser){
        $this->insert(['user' => $currentUser]);

        /**
         * Gets the last order belonging to the current user
         */
        $order = $this::all()->where('user', $currentUser)->last();
        
        //get cart content
        $cart = new Cart($request);
        $products = $cart->getProducts($request);

        $orderProduct = new OrderProduct();

        foreach($products as $product){
            $orderProduct->insert([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'amount' => $product->amount
            ]);
        }
    }

    /**
     * Get all orders belonging to specific user
     */
    public function getOrders($userId){
        return Order::where('user', $userId)->get();
    }
}
