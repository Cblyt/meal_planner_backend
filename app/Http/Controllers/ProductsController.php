<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Product;

class ProductsController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function show($id)
    {
        return Product::find($id);
    }

    public function getProductByName($name)
    {
        return Product::where('name', 'like', $name . '%')->orderBy('price', 'asc')->get();
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        $product->save();
        return $product;
    }

    public function generateProductDataByName(Request $request)
    {
        $stores = ['Aldi', 'Kroger', 'Walmart', 'Trader Joe', 'Publix'];
        $unit_types = ['grams', 'mililitres', 'kilograms'];

        foreach ($stores as &$store) {
            $product = Product::create($request->all());

            $price = mt_rand(1, 1000) / 100;
            $amount = mt_rand(1, 100);
            $units = $unit_types[mt_rand(0, 2)];

            $product->price = $price;
            $product->amount = $amount;
            $product->units = $units;
            $product->store = $store;
            $product->save();
            $products[] = $product;
        }
        return $products;
    }
}
