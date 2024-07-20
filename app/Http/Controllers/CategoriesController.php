<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;

class CategoriesController extends Controller
{
    public function liste()
    {
        $categories = Categorie::all();
        return view('categories.liste', compact('categories'));
    }

    public function ajout()
    {
        return view('categories.ajout');
    }

    public function enregistrer(Request $request)
    {
        $request->validate([
            'nom_cat' => 'required|unique:categories,nom_cat'
        ]);

        Categorie::create($request->all());

        return redirect()->route('liste_categories')->with('success', 'Catégorie ajoutée avec succès.');
    }

    public function modifier($id_cat)
    {
        $categorie = Categorie::findOrFail($id_cat);
        return view('categories.modif', compact('categorie'));
    }

    public function mettre_a_jour(Request $request, $id_cat)
    {
        $request->validate([
            'nom_cat' => 'required|unique:categories,nom_cat,' . $id_cat . ',id_cat'
        ]);

        $categorie = Categorie::findOrFail($id_cat);
        $categorie->update($request->all());

        return redirect()->route('liste_categories')->with('success', 'Catégorie modifiée avec succès.');
    }

    public function supprimer($id_cat)
    {
        $categorie = Categorie::findOrFail($id_cat);
        $categorie->delete();

        return redirect()->route('liste_categories')->with('success', 'Catégorie supprimée avec succès.');
    }
}
