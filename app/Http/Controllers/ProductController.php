<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('variants')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->has('has_variants') ? 0 : $request->price,
            'image' => $imagePath,
        ]);

        if ($request->has('has_variants') && $request->has('variants')) {
            foreach ($request->variants as $variant) {
                if (!empty($variant['label']) && $variant['price'] !== null && $variant['price'] !== '') {
                    ProductVariant::create([
                        'product_id' => $product->id,
                        'label' => $variant['label'],
                        'price' => $variant['price'],
                    ]);
                }
            }
        }

        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back();
    }
}