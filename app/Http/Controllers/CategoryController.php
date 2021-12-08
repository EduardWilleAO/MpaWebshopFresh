<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Gets all from categories and returns
     */
    public function index(){
        $allCategories = Category::all();

        return view('home', compact('allCategories'));
    }

    /**
     * Runs function from "productController" this retrieves all products belonging to the category
     * Foreach changes the category variable from id to actual name, for instance from "1" to "games"\
     * 
     * Returns both the category name and all the products associated.
     */
    public function getCategory($id){
        $categories = new Category();
        $category = $categories->getCategories('id', $id);
        
        $allProducts = app('App\Http\Controllers\ProductController')->returnWCategory($id);

        foreach($category as $index) $category = $index->category;

        return view('products', compact('category', 'allProducts'));
    }
}
