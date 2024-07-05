<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $products = Product::all();
        return response()->json($products);
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create( Request $request)
    {
        //
        // print_r($request);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'quantity' => 'required|integer',
        ]);
        $product = Product::create($validatedData);

        return response()->json($product, 201);
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
    public function getProduct(string $id)
    {
        //
        $product = Product::findOrFail($id);
    
        return response()->json( $product, 200);
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

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'quantity' => 'required|integer',
        ]);

        // Find the product by ID
        $product = Product::findOrFail($id);

        // Update specific fields if present in $validatedData
        if (isset($validatedData['name'])) {
            $product->name = $validatedData['name'];
        }
        if (isset($validatedData['description'])) {
            $product->description = $validatedData['description'];
        }
        if (isset($validatedData['price'])) {
            $product->price = $validatedData['price'];
        }
        if (isset($validatedData['quantity'])) {
            $product->quantity = $validatedData['quantity'];
        }

        // Save the updated product
        $product->save();

        // Return a JSON response with the updated product and HTTP status code 200 (OK)
        return response()->json($product, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        //
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json("Product deleted ", 200);


    }
}
