<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $categorySlug = null)
    {
        $categories = \App\Models\Category::all();
        $brands = \App\Models\Brand::all();
        $query = \App\Models\Product::query();

        if ($categorySlug) {
            $category = \App\Models\Category::where('slug', $categorySlug)->firstOrFail();
            $query->where('category_id', $category->id);
        }
        if ($categorySlug) {
            $category = \App\Models\Category::where('slug', $categorySlug)->firstOrFail();
            $query->where('category_id', $category->id);
        }
        if ($request->filled('categories')) {
            $query->whereIn('category_id', $request->categories);
        }

        if ($request->filled('brands')) {
            $query->whereIn('brand_id', $request->brands);
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        if ($request->filled('sort')) {
            if ($request->sort === 'price_asc') {
                $query->orderBy('price', 'asc');
            } elseif ($request->sort === 'price_desc') {
                $query->orderBy('price', 'desc');
            }
        } else {
            $query->latest();
        }
        if ($request->has('keyword') && $request->keyword != '') {
            $keyword = $request->keyword;
            $query->where('name', 'like', '%' . $keyword . '%');
        }
        $products = $query->paginate(12)->withQueryString();
        return view('customer.products.index', compact('products', 'categories', 'brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = \App\Models\Product::with('brand')->findOrFail($id);

        return view('customer.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
