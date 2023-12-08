<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function index()
    {
        $minutes = 60;

        $products = Cache::remember('products_all', $minutes, function () {
            return Product::all();
        });

        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $minutes = 30;
        
        $product = Cache::remember('product_' . $id, $minutes, function () use ($id) {
            return Product::findOrFail($id);
        });

        return view('products.show', compact('product'));
    }
}
