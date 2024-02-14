<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    // Example controller file
public function index()
{
    // List all recipes
    $recipes = Recipe::all();
    return response()->json(["status"=>200,"data"=>$recipes]);
}

public function store(Request $request)
{
    // Create a new recipe
    $data = $request->validate([
        'name' => 'required|string',
        'prep_time' => 'required|integer',
        'difficulty' => 'required|integer|between:1,3',
        'vegetarian' => 'required|boolean',
    ]);

    $recipe = Recipe::create($data);
    return response()->json($recipe, 201);
}

public function show($id)
{
    // Get a specific recipe by ID
    $recipe = Recipe::findOrFail($id);
    return response()->json($recipe);
}

public function update(Request $request, $id)
{
    // Update a specific recipe by ID
    $recipe = Recipe::findOrFail($id);

    $data = $request->validate([
        'name' => 'required|string',
        'prep_time' => 'required|integer',
        'difficulty' => 'required|integer|between:1,3',
        'vegetarian' => 'required|boolean',
    ]);

    $recipe->update($data);
    return response()->json($recipe);
}

public function destroy($id)
{
    // Delete a specific recipe by ID
    $recipe = Recipe::findOrFail($id);
    $recipe->delete();

    return response()->json(null, 204);
}

}
