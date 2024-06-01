<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Method to store a new product
    public function store(Request $request)
    {
        \Log::info('Incoming request data: ', $request->all()); // Log the request data

        // Validate incoming request
        $validatedData = $request->validate([
            'productName' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',

        ]);

        // Create and save the product
        $product = new Product();
        $product->productName = $validatedData['productName'];
        $product->price = $validatedData['price'];
        $product->description = $validatedData['description'];

        $product->save();

        // Return a response indicating success
        return response()->json(['message' => 'Product added successfully'], 201);
    }

    // Method to update an existing product
    public function update(Request $request, $id)
    {
        // Find the product by ID
        $product = Product::findOrFail($id);

        // Validate incoming request
        $validatedData = $request->validate([
            'productName' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',

        ]);

        // Update product details
        $product->productName = $validatedData['productName'];
        $product->price = $validatedData['price'];
        $product->productName = $validatedData['description'];
        $product->save();

        // Return a response indicating success
        return response()->json(['message' => 'Product updated successfully'], 200);
    }

    // Method to delete a product
    public function destroy($id)
    {
        // Find the product by ID and delete it
        $product = Product::findOrFail($id);
        $product->delete();

        // Return a response indicating success
        return response()->json(['message' => 'Product deleted successfully'], 200);
    }

    public function index()
    {
        try {
            $products = Product::all();
            return response()->json($products);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error fetching products'], 500);
        }
    }

    // Method to retrieve a specific product by ID
    public function show($id)
    {
        // Find the product by ID
        $product = Product::findOrFail($id);

        // Return a response with the product
        return response()->json($product, 200);
    }
}
