<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Boutique;
use App\Models\Categorie;

class ProduitsController extends Controller
{
    // Afficher la liste des produits
    public function liste()
    {
        $produits = Produit::all();
        return view('produits.liste', compact('produits'));
    }

    // Afficher le formulaire d'ajout de produit
    public function ajout()
    {
        $boutiques = Boutique::all();
        $categories = Categorie::all();
    
        return view('produits.ajout', compact('boutiques', 'categories'));
    }

    // Enregistrer un nouveau produit
    public function enregistrer(Request $request)
    {
        $request->validate([
            'libelle' => 'required',
            'description' => 'nullable',
            'prix_achat' => 'required|numeric|min:0',
            'prix_vente' => 'required|numeric|min:0',
            'stock_min' => 'required|integer|min:0',
            'stock_max' => 'required|integer|min:0',
            'photo' => 'nullable',
            'id_categorie' => 'required|exists:categories,id_cat',
            'id_boutique' => 'required|exists:boutiques,id_bout',
        ]);

        Produit::create($request->all());

        return redirect()->route('produits.liste')->with('success', 'Produit ajouté avec succès.');
    }

    // Afficher le formulaire de modification d'un produit
    public function modifier($id)
    {
        // Récupérer le produit à modifier
        $produit = Produit::findOrFail($id);
    
        // Récupérer les catégories pour le menu déroulant
        $categories = Categorie::all();
    
        // Récupérer les boutiques pour le menu déroulant
        $boutiques = Boutique::all();
    
        // Retourner la vue avec le produit et les données nécessaires
        return view('produits.modif', compact('produit', 'categories', 'boutiques'));
    }
    

    // Mettre à jour un produit existant
    public function mettreAJour(Request $request, $id)
    {
        $produit = Produit::findOrFail($id);

        $request->validate([
            'libelle' => 'required',
            'description' => 'nullable',
            'prix_achat' => 'required|numeric|min:0',
            'prix_vente' => 'required|numeric|min:0',
            'stock_min' => 'required|integer|min:0',
            'stock_max' => 'required|integer|min:0',
            'photo' => 'nullable',
            'id_categorie' => 'required|exists:categories,id_cat',
            'id_boutique' => 'required|exists:boutiques,id_bout',
        ]);

        $produit->update($request->all());

        return redirect()->route('produits.liste')->with('success', 'Produit mis à jour avec succès.');
    }

    // Supprimer un produit
    public function supp($id)
    {
        $produit = Produit::findOrFail($id);
        $produit->delete();

        return redirect()->route('produits.liste')->with('success', 'Produit supprimé avec succès.');
    }
}
