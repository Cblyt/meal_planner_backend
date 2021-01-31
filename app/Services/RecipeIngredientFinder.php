<?php

namespace App\Services;

use \App\Models\Ingredient;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

// Take all ingredients from a recipe.
// Find those ingredients as products.
class RecipeIngredientFinder 
{
    /**
     * Get an array of products which match the ingredient
     *
     * @param  \App\Models\Recipe
     * @return array[\App\Models\Products]
     */
    public function getMatchingProducts($id)
    {
        $ingredients = Ingredient::where('recipe_id',$id)->get();
        $products = [];



        foreach (["Aldi", "Publix", "Trader Joe", "Walmart", "Kroger"] as $store) {           
            $totalcost = 0;
            $data = [];

            foreach ($ingredients as &$ingredient) {
                $matchingProduct = $this->cheapestProductAtStore($ingredient, $store);
                // $matchingProduct->put('ingredient name', $ingredient->name);
                if(isset($matchingProduct)) {
                    $data[] = 
                    [
                        'ingredient_name' => $ingredient->name,
                        'product_name' => $matchingProduct->name,
                        'price' => '$'.$matchingProduct->price,
                        'amount' => $matchingProduct->amount,
                        'units' => $matchingProduct->units
                    ];
                    $totalcost += $matchingProduct->price;
                    
                }
                else {
                    $data[] = 
                    [
                        'ingredient_name' => $ingredient->name,
                        'product_name' => "Match not found",
                        'price' => "",
                        'amount' => "",
                        'units' => ""
                    ];
                }
                
            }
            $products[] = ["store" => $store, "data" => $data];
            // $products[$store]= Arr::prepend($products[$store], $totalcost, "total_cost");
        }
        return $products;
    }

    /**
     * Get an array of products which match an ingredient
     *
     * @param  \App\Models\Ingredient
     * @return array[\App\Models\Products]
     */
    public function cheapestProductAtStore($ingredient, $store)
    {
        $matchingProduct = Product::where('name', 'like', $ingredient->name.'%')
            ->where('store', $store)->orderBy('price', 'asc')->first();
        
        return $matchingProduct;
    }
}