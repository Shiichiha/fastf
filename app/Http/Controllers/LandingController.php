<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class LandingController extends Controller
{
    
    public function index()
    {
        $categories = Category::all();
        $products = Product::with('variants', 'addons')->get();

        return view('landing', compact('categories', 'products'));
    }
}
