<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'image' => 'required|url',
            'is_best_seller' => 'boolean',
            'is_new_arrival' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['name']) . '-' . Str::random(5);
        $validated['is_best_seller'] = $request->boolean('is_best_seller');
        $validated['is_new_arrival'] = $request->boolean('is_new_arrival');

        Product::create($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'image' => 'required|url',
            'is_best_seller' => 'boolean',
            'is_new_arrival' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['name']) . '-' . Str::random(5);
        $validated['is_best_seller'] = $request->boolean('is_best_seller');
        $validated['is_new_arrival'] = $request->boolean('is_new_arrival');

        $product->update($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil dihapus!');
    }
}
