<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\Instruction;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Recipe::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'description' => ['required'],
            'serves' => ['required'],
            'cooking_duration' => ['required'],
            'difficulty' => ['required'],
            'ingredients' => ['required'],
            'method' => ['required']
        ]);

        $recipe = Recipe::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'serves' => $data['serves'],
            'cooking_duration' => $data['cooking_duration'],
            'difficulty' => $data['difficulty'],
        ]);

        $ingredients = $data['ingredients'];
        foreach ($ingredients as &$ingredient) {
            Ingredient::create([
                'name' => $ingredient['name'],
                'amount' => $ingredient['amount'] ?? null,
                'units' => $ingredient['units'] ?? null,
                'recipe_id' => $recipe->id,
            ]);
        }

        $instructions = $data['method'];
        foreach ($instructions as &$instruction) {
            Instruction::create([
                'instruction' => $instruction['content'],
                'recipe_id' => $recipe->id
            ]);
        }

        return $recipe;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipe = Recipe::select('id', 'name', 'description', 'difficulty', 'serves', 'cooking_duration')->find($id);
        $data = $recipe;

        $ingredients = Ingredient::where('recipe_id', $id)->select('id', 'name', 'amount', 'units')->get();
        $data['ingredients'] = $ingredients;

        $method = Instruction::where('recipe_id', $id)->select('instruction')->get();
        foreach ($method as &$instruction) {
            $instructions[] = $instruction->instruction;
        }
        $data['instructions'] = $instructions;
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, recipe $recipe)
    {
        //
    }

    public function destroy($id)
    {
        Ingredient::where('recipe_id', $id)->delete();
        Instruction::where('recipe_id', $id)->delete();
        return Recipe::destroy($id);
    }
}
