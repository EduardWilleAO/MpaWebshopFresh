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
     * Uses the findOrFail to retrieve a specific category with an id
     * 
     * @param products is retrieved with "hasMany" from the category model
     * @param category is overwritten with the name of the current category
     * 
     * Return all the products and the category name
     */
    public function getCategory($id){
        $category = Category::findOrFail($id);
        $products = $category->products;  
        $category = $category->category;
        
        return view('products', compact('products', 'category'));
    }
}
