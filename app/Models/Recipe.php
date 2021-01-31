<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'cost', 'name', 'ingredients'
    ];

    // Calculate the cost of the cheapest occurence of this ingredient
    public function calculateCost()
    {
        // Used 'like' due to the format of the sample data
        $productPrice = Product::where('name', 'like',$this->ingredients.'%')->orderBy('price', 'asc')->first()->price;

        return $productPrice;
    }

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }
}
