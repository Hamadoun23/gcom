<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Boutique;

class BoutiquesController extends Controller
{
    public function liste_boutiques()
    {
        $boutiques = Boutique::all();
        return view('boutiques.liste', compact('boutiques'));
    }

    public function ajout_boutiques()
    {
        return view('boutiques.ajout');
    }

    public function enregistrer_boutiques(Request $request)
    {
        // Définition des messages de validation personnalisés
        $messages = [
            'nom_bout.unique' => 'Le nom de cette boutique existe déjà. Veuillez choisir un autre nom.',
            'required' => 'Le champ :attribute est requis.',
        ];

        // Validation des données
        $request->validate([
            'nom_bout' => 'required|unique:boutiques,nom_bout',
            'adresse_bout' => 'required',
        ], $messages);

        // Enregistrement de la boutique
        $boutique = new Boutique();
        $boutique->nom_bout = $request->nom_bout;
        $boutique->adresse_bout = $request->adresse_bout;
        $boutique->save();

        return redirect()->route('liste_boutiques')->with('success', 'Boutique ajoutée avec succès.');
    }

    public function supp_boutiques($id)
    {
        $boutique = Boutique::findOrFail($id);
        $boutique->delete();

        return redirect()->route('liste_boutiques')->with('success', 'Boutique supprimée avec succès.');
    }

    public function modif_boutiques($id)
    {
        // Récupérer la boutique à modifier
        $boutique = Boutique::findOrFail($id);

        // Passer les données à la vue
        return view('boutiques.modif', compact('boutique'));
    }

    public function enregistrer_modif_boutiques(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'nom_bout' => 'required|unique:boutiques,nom_bout,' . $id . ',id_bout',
            'adresse_bout' => 'required',
        ]);

        // Trouver la boutique à modifier
        $boutique = Boutique::findOrFail($id);

        // Mettre à jour les champs
        $boutique->nom_bout = $request->nom_bout;
        $boutique->adresse_bout = $request->adresse_bout;
        $boutique->save();

        // Rediriger avec succès
        return redirect()->route('liste_boutiques')->with('success', 'Boutique mise à jour avec succès.');
    }

    public function details_boutique($id)
    {
        $boutique = Boutique::with('produits.categorie')->findOrFail($id);
        return view('boutiques.details', compact('boutique'));
    }
}
