<?php

use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use App\Models\Recipe;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $recipe = Recipe::all(); 

    return view('dashboard', ['recipe' => $recipe]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('recipe', RecipeController::class);
    Route::resource('favorite', FavoriteController::class);

    Route::post('recipe/rating', [RecipeController::class, 'saveRating'])->name('recipe.rating');

    Route::post('recipe/comment', [RecipeController::class, 'sendComment'])->name('recipe.comment');
});

require __DIR__.'/auth.php';
