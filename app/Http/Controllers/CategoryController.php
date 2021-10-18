<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $allCategories = Category::all();

        return view('home', compact('allCategories'));
    }

    public function getCategory($id){
        $category = Category::all()->where('id', $id);
        $allProducts = app('App\Http\Controllers\ProductController')->returnSpecific($id);

        foreach($category as $index) $category = $index->category;

        return view('products', compact('category', 'allProducts'));
    }
}
