<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Cart;

class ProductController extends Controller
{
    /**
     * Simple function that gets a single product
     */
    public function returnSingle($id){
        $product = Product::where('id', $id)->get();

        return view('product', compact('product'));
    }

    /**
     * Gets a singular product, 
     * this retrieved product will be sent to cart controller to add it to the cart session.
     */
    public function addToCart(Request $request){
        $id = $_POST['id'];
        $userAmount = $_POST['amount'];

        $product = Product::where('id', $id)->get();

        $cart = new Cart($request);

        foreach($product as $index){
            $cart->addToCart($request, $index, $userAmount);
        }
        
        return back();
    }
}
