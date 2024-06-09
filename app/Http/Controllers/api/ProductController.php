<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // paginate the products
        $products = Product::query()->orderBy('created_at', 'desc')->paginate(10);

        $customProducts = $products->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'category' => $product->category,
                'price' => $product->price,
                'stock' => $product->stock,
                'description' => $product->description,
                'image' => url('storage/products/' . $product->image),
                'created_at' => $product->created_at,
                'updated_at' => $product->updated_at
            ];
        });

        return response()->json([
            'message' => 'success',
            'status' => '200',
            'data' => $customProducts
        ]);
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