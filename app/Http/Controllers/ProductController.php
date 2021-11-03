<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function returnSingle($id){
        $product = Product::where('id', $id)->get();

        return view('product',compact('product'));
    }

    public function returnWCategory($id){
        $allProducts = Product::where('category_id', $id)->get();

        return $allProducts;
    }

    public function returnAll(){
        $allProducts = Product::all();

        return view('products', compact('allProducts'));
    }

    public function getForCart(Request $request){
        $id = $_POST['id'];
        $userAmount = $_POST['amount'];

        $specificProduct = Product::where('id', $id)->get();

        app('App\Http\Controllers\CartController')->addToCart($request, $specificProduct, $userAmount);
        
        //return redirect('cart')->with('specificProduct');
        return back();
    }
}
