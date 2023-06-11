<?php

namespace App\Http\Controllers;

use App\Http\Middleware\user;
use App\Models\categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $categories = categorie::withCount('cars')->paginate(5);
        return view('admin.categories', compact('categories','user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user=Auth::user();
        return view('admin.ajouteCategorie',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nameCategorie' => 'required|unique:categories,nameCategorie',
            'path' => 'required|image',
        ], [
            'nameCategorie.required' => 'Le champ nom de catégorie est requis.',
            'nameCategorie.unique' => 'Ce nom de catégorie est déjà utilisé.',
            'path.required' => 'Le champ de la photo est requis.',
            'path.image' => 'Le fichier doit être une image.',
        ]);
    
        $category = new Categorie();
        $category->nameCategorie = $request->input('nameCategorie');
    
        if ($request->hasFile('path')) {
            $imagePath = $request->file('path')->getClientOriginalName();
            $path = $request->file('path')->storeAs('categorie', $imagePath, 'category');
            $category->path = $path;
        }
    
        $category->save();
    
        return redirect()->route('categorie.index')->with('success', 'Category created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $category = categorie::findOrfail($id);
        return view('admin.Updatecategories',compact('user','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = categorie::findOrFail($id);

        // Validate the form data
        $validatedData = $request->validate([
            'nameCategorie' => 'required',
        ]);
    
        // Update the category name
        $category->nameCategorie = $validatedData['nameCategorie'];
        if ($request->hasFile('path')) {
            $imagePath = $request->file('path')->getClientOriginalName();
            $path = $request->file('path')->storeAs('categorie', $imagePath, 'category');
    
            // Delete the old photo
            if ($category->path) {
                Storage::disk('category')->delete($category->path);
            }
    
            $category->path = $path;
        }
    
        $category->save();
    
        return redirect()->route('categorie.index')->with('success', 'Category updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categorie = categorie::findOrFail($id);

        // Delete the car image from the storage disk
        Storage::disk('category')->delete($categorie->path);
    
        // Delete the car record from the database
        $categorie->delete();

        return redirect()->route('categorie.index')->with('success', "La suppression de categorie a bien réussi!");
    }
}
