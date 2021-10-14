<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function returnSpecific($id){
        $allProducts = Product::all()->where('category_id', $id);

        return view('products', compact('allProducts'));
    }

    public function returnAll(){
        $allProducts = Product::all();

        return view('products', compact('allProducts'));
    }

    public function getForCart(Request $request, $id){
        $specificProduct = Product::all()->where('id', $id);

        app('App\Http\Controllers\CartController')->addToCart($request, $specificProduct);
        
        //return redirect('cart')->with('specificProduct');
        return back();
    }
}
