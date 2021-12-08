<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Simple function that gets a single product
     */
    public function returnSingle($id){
        $product = new Product();
        $product = $product->getProducts('id', $id);

        return view('product', compact('product'));
    }

    /**
     * Function that gets all product from specific category
     */
    public function returnWCategory($id){
        $product = new Product();
        $allProducts = $product->getProducts('category_id', $id);

        return $allProducts;
    }

    /**
     * Gets all products
     */
    public function returnAll(){
        $allProducts = Product::all();

        return view('products', compact('allProducts'));
    }

    /**
     * Gets a singular product, 
     * this retrieved product will be sent to cart controller to add it to the cart session.
     */
    public function getForCart(Request $request){
        $id = $_POST['id'];
        $userAmount = $_POST['amount'];

        $product = new Product();
        $specificProduct = $product->getProducts('id', $id);

        app('App\Http\Controllers\CartController')->addToCart($request, $specificProduct, $userAmount);
        
        return back();
    }
}
