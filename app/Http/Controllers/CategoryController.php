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
        $categories = new Category();
        $category = $categories->getCategories('id', $id);
        
        $allProducts = app('App\Http\Controllers\ProductController')->returnWCategory($id);

        foreach($category as $index) $category = $index->category;

        return view('products', compact('category', 'allProducts'));
    }
}
