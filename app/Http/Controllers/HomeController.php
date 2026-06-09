<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $bestSellers = Product::where('is_best_seller', true)->take(4)->get();
        $newArrivals = Product::where('is_new_arrival', true)->take(4)->get();
        $categories = Category::all();

        return view('home.index', compact('bestSellers', 'newArrivals', 'categories'));
    }
}
