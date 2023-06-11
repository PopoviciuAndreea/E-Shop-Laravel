<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class AdminController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view ('products.index', compact('products'));
    }

    public function create() 
    {
        return view('products.create');
    }

    public function store(Product $product, StoreProductRequest $request)
    {
        $product->create(array_merge($request->validated()));
        return redirect()->route('products.index')
            ->withSuccess(__('Product created successfully'));
    }

    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product
        ]);
    }

    public function edit(Product $product)
    {
        return view('products.edit', [
            'product' => $product
        ]);
    }

    public function update(Product $product, UpdateProductRequest $request)
    {
        $product->update($request->validated());

        return redirect()->route('products.index')
            ->withSuccess(__('Product updated successfully'));
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
            ->withSuccess(__('Product deleted successfully'));
    }
}
