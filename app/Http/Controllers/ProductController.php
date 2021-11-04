<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function returnSingle($id){
        $product = new Product();
        $products = $product->getProducts('id', $id);

        return view('product',compact('product'));
    }

    public function returnWCategory($id){
        $product = new Product();
        $allProducts = $product->getProducts('category_id', $id);

        return $allProducts;
    }

    public function returnAll(){
        $allProducts = Product::all();

        return view('products', compact('allProducts'));
    }

    public function getForCart(Request $request){
        $id = $_POST['id'];
        $userAmount = $_POST['amount'];

        $product = new Product();
        $specificProduct = $product->getProducts('id', $id);

        app('App\Http\Controllers\CartController')->addToCart($request, $specificProduct, $userAmount);
        
        //return redirect('cart')->with('specificProduct');
        return back();
    }
}
