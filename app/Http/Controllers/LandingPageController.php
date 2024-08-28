<?php

// app/Http/Controllers/LandingPageController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class LandingPageController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('landing', compact('categories', 'products'));
    }
}