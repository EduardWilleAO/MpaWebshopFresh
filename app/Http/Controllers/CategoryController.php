<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request){
        $allCategories = Category::all();

        return view('home', compact('allCategories'));
    }
}
