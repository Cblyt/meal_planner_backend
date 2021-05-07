<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruction extends Model
{
    use HasFactory;

    protected $fillable = [
        'instruction',
        'recipe_id'
    ];

    public $timestamps = false;

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
