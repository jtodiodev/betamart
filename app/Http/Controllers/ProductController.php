<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Method to store a new product
    public function store(Request $request)
    {
        // Validate incoming request
        $validatedData = $request->validate([
            'productName' => 'required|string',
            'price' => 'required|numeric',
        ]);

        // Create and save the product
        $product = new Product();
        $product->productName = $validatedData['productName'];
        $product->price = $validatedData['price'];
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
        ]);

        // Update product details
        $product->productName = $validatedData['productName'];
        $product->price = $validatedData['price'];
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

    // Method to retrieve all products
    public function index()
    {
        // Retrieve all products
        $products = Product::all();

        // Return a response with the products
        return response()->json($products, 200);
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
