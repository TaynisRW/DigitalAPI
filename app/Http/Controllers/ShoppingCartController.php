<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateShoppingCartRequest;
use App\Http\Requests\UpdateShoppingCartRequest;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    // GET for list register
    public function index(Request $request)
    {
        if($request->has('search'))
        {
            $products = ShoppingCart::where('product_name', 'like', '%'.$request->search.'%')
                        ->orWhere('product_price', $request->search)
                        ->orWhere('id_product', $request->search)
                        ->get();
        }
        else
        {
            $products = ShoppingCart::all();
        }
        return $products;
        return ShoppingCart::all();
    }

      // POST insert data
    public function store(CreateShoppingCartRequest $request)
    {
        $input = $request->all();
        ShoppingCart::create($input);
        return response()->json([
            'res' => true,
            'message' => 'Successfully created record'
        ], 201);
    }

    // GET return once record
    public function show(ShoppingCart $shoppingCart)
    {
        return $shoppingCart;
    }

    // PUT update record
    public function update(UpdateShoppingCartRequest $request, ShoppingCart $shoppingCart)
    {
        // Catch update data
        $input = $request->all();
        $shoppingCart->update($input);
        return response()->json([
            'res' => true,
            'message' => 'Successfully updated record'
        ], 200);
    }

    // DELETE a record from data
    public function destroy($id)
    {
        ShoppingCart::destroy($id);
        return response()->json([
            'res' => true,
            'message' => 'Successfully deleted record'
        ], 200);
    }
}
