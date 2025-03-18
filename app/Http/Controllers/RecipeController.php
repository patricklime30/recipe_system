<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user()->id;
        $recipe = Recipe::where('user_id', $user)->get();

        $totalBreakfast = Recipe::where('user_id', $user)
                            ->where('category', 'breakfast')
                            ->count();

        $totalLunch = Recipe::where('user_id', $user)
                            ->where('category', 'lunch')
                            ->count();

        $totalDinner = Recipe::where('user_id', $user)
                            ->where('category', 'dinner')
                            ->count();

        return view('recipes.index', [
                                        'recipe' => $recipe,
                                        'totalBreakfast' => $totalBreakfast,
                                        'totalLunch' => $totalLunch,
                                        'totalDinner' => $totalDinner,
                                    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) { 
            // Get the original file extension
            $extension = $request->file('image')->getClientOriginalExtension();
        
            // Create a unique filename using the recipe title and current timestamp
            $filename = Str::slug($request->title) . '-' . time() . '.' . $extension;

            // Store the image in the 'public/images' directory
            $imagePath = $request->file('image')->storeAs('images', $filename, 'public');
        }

        Recipe::create([
            'title' => $request->title,
            'ingredients' => $request->ingredients,
            'instructions' => $request->instructions,
            'image_path' => $imagePath,
            'cooking_time' => $request->cooking_time,
            'category' => $request->category,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('recipe.index')->with('success', 'Recipe saved successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $recipe = Recipe::find($id);

        // Check if the recipe is favorited by the user
        $isFavorited = $recipe->favorites()->where('user_id', Auth::user()->id)->exists();

        // check rating calculation
        $ratingValue = Rating::where('recipe_id', $id)->avg('score');

        return view('recipes.view', ['recipe'=>$recipe, 'isFavorited' => $isFavorited, 'ratingValue' => $ratingValue]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $recipe = Recipe::findOrFail($id);

        return view('recipes.edit', ['recipe' => $recipe]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'ingredients' => $request->ingredients,
            'instructions' => $request->instructions,
            'cooking_time' => $request->cooking_time,
            'category' => $request->category,
        ];

        $recipe = Recipe::findOrFail($id);
        
        if ($request->hasFile('image')) { 
             // Delete the old image if it exists
            if ($recipe->image_path) {
                Storage::delete($recipe->image_path);
            }
            // Get the original file extension
            $extension = $request->file('image')->getClientOriginalExtension();
        
            // Create a unique filename using the recipe title and current timestamp
            $filename = Str::slug($request->title) . '-' . time() . '.' . $extension;

            // Store the image in the 'public/images' directory
            $imagePath = $request->file('image')->storeAs('images', $filename, 'public');

            $data['image_path'] = $imagePath;
        }

        $recipe->update($data);

        return redirect()->route('recipe.index')->with('success', 'Recipe updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $recipe = Recipe::findOrFail($id);

        // Delete the image from storage if it exists
        if ($recipe->image_path) {
            Storage::delete($recipe->image_path);
        }

        // Delete the recipe from the database
        $recipe->delete();

        return redirect()->route('recipe.index')->with('success', 'Recipe deleted successfully.');
    }

    public function saveRating(Request $request)
    {
        $user = Auth::user()->id;

        $rating = Rating::where('from_user', $user)
                            ->where('recipe_id', $request->recipe_id)
                            ->first();
        
        if($rating){
            $rating->delete();
        }
        
        Rating::create(['from_user' => $user, 'recipe_id' => $request->recipe_id, 'score' => $request->rating]);

        return response()->json(['success' => 'Rating added!']);
    }
}
