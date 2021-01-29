<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    // GET for list register
    public function index(Request $request)
    {
        // Verify if a request have search param
        if($request->has('search'))
        {
            $products = Product::where('product_name', 'like', '%'.$request->search.'%')
                        ->orWhere('product_price', $request->search)
                        ->orWhere('id_product', $request->search)
                        ->get();
        }
        else
        {
            // If don´t have param request all records
            $products = Product::all();
        }
        return $products;
    }

    // Insert files on JSON request
    private function loadRecord($file)
    {
        // Extract name and extension of file
        $fileName = time() ."." . $file->getClientOriginalExtension();
        // Save file on public folder
        $file->move(public_path('images'), $fileName);
        return $fileName;
    }

    // POST insert data
    public function store(CreateProductRequest $request)
    {
        // Catch data
        $input = $request->all();
        // Verify if send a file
        if($request->has('product_image'))
            $input['product_image'] = $this->loadRecord($request->product_image);
        // Create record
        Product::create($input);
        // Response message
        return response()->json([
            'res' => true,
            'message' => 'Successfully created record'
        ], 201);
    }

    // GET return once record
    public function show(Product $product)
    {
        // Search record for id
        return $product;
    }

    // PUT update record
    public function update(UpdateProductRequest $request, Product $product)
    {
        // Catch update data
        $input = $request->all();
        // Verify if send a file
        if($request->has('product_image'))
            $input['product_image'] = $this->loadRecord($request->product_image);
        // Update record
        $product->update($input);
        // Response message
        return response()->json([
            'res' => true,
            'message' => 'Successfully updated record'
        ], 200);
    }

    // DELETE a record from data
    public function destroy($id)
    {
        // Delete record
        Product::destroy($id);
        // Response message
        return response()->json([
            'res' => true,
            'message' => 'Successfully deleted record'
        ], 200);
    }
}
