<?php

namespace App\Services;

use \App\Models\Ingredient;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;


// Take all ingredients from a recipe.
// Find those ingredients as products.
class RecipeIngredientFinder
{
    public function ingredientsToProducts($ingredients)
    {
        $products = [];

        $stores = Product::select('store')->distinct()->get();

        // For each store (can be customisable based on request header)
        foreach ($stores as $store) {
            $totalCost = 0;
            $missingProducts = 0;
            $data = [];

            foreach ($ingredients as &$ingredient) {

                $matchingProduct = $this->cheapestProductAtStore($ingredient, $store->store);

                $data[] = $this->formData($matchingProduct, $ingredient);
                if (isset($matchingProduct->price)) {
                    $totalCost += $matchingProduct->price;
                } else {
                    $missingProducts += 1;
                }
            }

            $products[] = ["store" => $store->store, "data" => $data, "total_cost" => $totalCost, "missing_products" => $missingProducts];
        }

        $sortedProducts = $this->sortByPriceAscending($products);

        return $sortedProducts;
    }

    public function formData($matchingProduct, $ingredient)
    {
        // If a matchingProduct is returned form the data field to output
        if (isset($matchingProduct)) {

            return $data[] =
                [
                    'ingredient_name' => $ingredient->name,
                    'product_id' => $matchingProduct->id,
                    'product_name' => $matchingProduct->name,
                    'price' => '$' . $matchingProduct->price,
                    'amount' => $matchingProduct->amount,
                    'units' => $matchingProduct->units
                ];
        } else {
            return $data[] =
                [
                    'ingredient_name' => $ingredient->name,
                    'product_id' => "",
                    'product_name' => "Match not found",
                    'price' => "",
                    'amount' => "",
                    'units' => ""
                ];
        }
    }

    public function sortByPriceAscending($products)
    {
        $sortedProducts = array_values(Arr::sort($products, function ($value) {
            return $value['total_cost'] + ($value['missing_products'] * 1000);
        }));
        return $sortedProducts;
    }

    /**
     * Get an array of products which match an ingredient
     *
     * @param  \App\Models\Ingredient
     * @return array[\App\Models\Products]
     */
    public function cheapestProductAtStore($ingredient, $store)
    {
        $matchingProducts = Product::where('name', 'like', $ingredient->name . '%')
            ->where('store', $store)->orderBy('price', 'asc')->get();

        $matchingProduct = ($this->filterMatchingProducts($matchingProducts));

        return $matchingProduct;
    }

    // Choosing which matching product to show
    // Beginning implementation on filtering out specific products on customer request
    public function filterMatchingProducts($matchingProducts)
    {
        $counter = 0;
        $disallowed_ids = [];

        // If the request contains ids to disallow
        if (Request()->ids) {
            $disallowed_ids = Request()->ids;
        }

        // For each matchingProduct in priceAsc order, choose the first that is not disallowed.
        while (count($matchingProducts) > $counter && in_array($matchingProducts[$counter]->id, $disallowed_ids)) {
            $counter += 1;
        }

        return $matchingProducts[$counter] ?? null;
    }

    public function getMatchingProductsByIngredientIds(Request $request)
    {
        foreach ($request->ingr as $ingredient_id) {
            $ingredients[] = Ingredient::where('id', $ingredient_id)->first();
        }
        return $this->ingredientsToProducts($ingredients);
    }

    public function getMatchingProductsByRecipeId($id, Request $request)
    {
        // Get all ingredients from recipe
        $ingredients = Ingredient::where('recipe_id', $id)->get();
        return $this->ingredientsToProducts($ingredients);
    }

    public function getCheapestMatchingProductsByRecipeId($id, Request $request)
    {

        $allStoreShoppingLists = $this->getMatchingProductsByRecipeId($id, $request);
        return $allStoreShoppingLists[0];
    }
}
