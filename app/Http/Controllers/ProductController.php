<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index($id){
        $allProducts = Product::all()->where('category_id', $id);

        return view('products', compact('allProducts'));
    }

    public function returnAll(){
        $allProducts = Product::all();

        return view('products', compact('allProducts'));
    }
}
