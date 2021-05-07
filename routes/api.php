<?php

use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\IngredientsController;
use App\Services\RecipeIngredientFinder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getMatchingProducts', [RecipeIngredientFinder::class, 'getMatchingProductsByIngredientIds']);
Route::apiResource('recipes', RecipeController::class);
Route::get('/products/{name}', [ProductsController::class, 'getProductByName']);
Route::apiResource('products', ProductsController::class);
Route::post('/generateProductDataByName', [ProductsController::class, 'generateProductDataByName']);

Route::get('/getMatchingProducts/{id}', [RecipeIngredientFinder::class, 'getMatchingProductsByRecipeId']);
Route::get('/getCheapestMatchingProducts/{id}', [RecipeIngredientFinder::class, 'getCheapestMatchingProductsByRecipeId']);


Route::post('/ingredient', [IngredientsController::class, 'create']);
