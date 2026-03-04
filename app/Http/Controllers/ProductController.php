<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductRequest $request)
    {

        $minPrice = $request->input('minPrice');
        $maxPrice = $request->input('maxPrice');
        $sort = $request->input('sort', 'asc');
        $activeCategoryId = $request->input('category');

        $products = Product::
              when($activeCategoryId, fn($q) => $q->where('category_id', $activeCategoryId))
            ->when($minPrice !== null, fn($q) => $q->where('price', '>=', $minPrice))
            ->when($maxPrice !== null, fn($q) => $q->where('price', '<=', $maxPrice))
            ->orderBy('price', $sort)
            ->simplePaginate(10);

        return view('products.index', [
            'products' => $products,
            'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Product::create($request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'description' => 'required|string'
        ]));
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'description' => 'required|string'
        ]));
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('products.index');
    }
}
