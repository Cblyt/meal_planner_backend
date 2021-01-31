<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use \App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function store(Request $request)
    {
        return Product::create($request->all());
    }

    public function show($id)
    {
        return Product::find($id);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        $product->save();
        return $product;
    }

    public function destroy($id)
    {
        return Product::destroy($id); 
    }

    public function getProductByName($name)
    {
        return Product::where('name', 'like',$name.'%')->orderBy('price', 'asc')->get();
    }
    
    // public function generateRandPricesForProducts()
    // {
    //     $products = Product::all();
    //     foreach($products as &$product)
    //     {
    //         if($product->price < 0.01) {
    //             $price = mt_rand(1, 10000)/100;
    //             $product->price = $price;
    //             $product->save();
    //             print($product->id);
    //         }
    //     }
    // }

    public function generateRandSupermarketsForProducts()
    {
        $supermarkets[] = ['aldi', 'tesco', 'asda', 'waitrose'];
        $products = Product::all();
        foreach($products as &$product)
        {
            if($product->supermarket == null) {
                $rnd = mt_rand(0, 3);
                $product->supermarket = $supermarkets[$rnd];
                $product->save();
                print($product->id);
            }
        }
    }
}