<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::with('category');

        if (request('category')) {
            $products->whereHas('category', fn($q) => $q->where('slug', request('category')));
        }

        if (request('sort') === 'price_asc') {
            $products->orderBy('price');
        } elseif (request('sort') === 'price_desc') {
            $products->orderBy('price', 'desc');
        } else {
            $products->latest();
        }

        $products = $products->paginate(12);

        return view('products.index', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
        $related = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('products.show', compact('product', 'related'));
    }
}
