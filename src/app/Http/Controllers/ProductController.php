<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Season;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(6);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $seasons = Season::all();
        return view('products.create', compact('seasons'));
    }

    public function store(Request $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $request->file('image')->store('products', 'public'),
            'description' => $request->description,
        ]);
        $product->seasons()->attach($request->seasons);
        return redirect('/products');
    }

    public function search(Request $request)
    {
        $query = Product::query();
        if ($request->keyword) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }
        if ($request->sort === 'asc') {
            $query->orderBy('price', 'asc');
        } elseif ($request->sort === 'desc') {
            $query->orderBy('price', 'desc');
        }
        $products = $query->paginate(6);
        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $seasons = Season::all();
        return view('products.edit', compact('product', 'seasons'));
    }

    public function update(Request $request, Product $product)
    {
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);
        if ($request->hasFile('image')) {
            $product->update([
                'image' => $request->file('image')->store('products', 'public'),
            ]);
        }
        $product->seasons()->sync($request->seasons);
        return redirect('/products');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/products');
    }
}