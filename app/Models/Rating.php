<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'score',
        'recipe_id',
        'from_user',
    ];
}
