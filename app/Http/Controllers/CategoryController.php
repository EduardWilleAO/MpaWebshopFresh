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
}
