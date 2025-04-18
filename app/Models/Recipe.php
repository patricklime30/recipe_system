<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Recipe extends Model
{   
    protected $fillable = [
        'title',
        'ingredients',
        'instructions',
        'cooking_time',
        'category',
        'image_path',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function favorites(){
        return $this->hasMany(Favorite::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
