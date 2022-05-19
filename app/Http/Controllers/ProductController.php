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
        $product = Product::where('id', $id)->get();

        return view('product', compact('product'));
    }
}
