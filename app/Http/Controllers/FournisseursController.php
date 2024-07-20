<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;

class FournisseursController extends Controller
{
    // Affiche la liste des fournisseurs
    public function liste_fournisseurs()
    {
        $fournisseurs = Fournisseur::all();
        return view('fournisseurs.liste', compact('fournisseurs'));
    }

    // Affiche le formulaire de création d'un fournisseur
    public function ajout_fournisseurs()
    {
        return view('fournisseurs.ajout');
    }

    // Enregistre un nouveau fournisseur
    public function enregistrer_fournisseurs(Request $request)
    {
        $request->validate([
            'prenom_frs' => 'required|string|max:50',
            'nom_frs' => 'required|string|max:50',
            'adresse_frs' => 'nullable|string|max:100',
            'tel_frs' => 'nullable|string|max:20|unique:fournisseurs,tel_frs',
        ], [
            'tel_frs.unique' => 'Ce numéro existe déjà, veuillez insérer un autre.',
        ]);
    
        Fournisseur::create($request->all());
    
        return redirect()->route('fournisseurs.liste')->with('success', 'Fournisseur ajouté avec succès.');
    }

    // Affiche le formulaire de modification d'un fournisseur
    public function modif_fournisseurs($id)
    {
        $fournisseur = Fournisseur::findOrFail($id);
        return view('fournisseurs.modif', compact('fournisseur'));
    }

    // Met à jour un fournisseur existant
    public function mettreAJour(Request $request, $id)
    {
        $fournisseur = Fournisseur::findOrFail($id);

        $request->validate([
            'prenom_frs' => 'required|string|max:50',
            'nom_frs' => 'required|string|max:50',
            'adresse_frs' => 'nullable|string|max:100',
            'tel_frs' => 'nullable|string|max:20|unique:fournisseurs,tel_frs,' . $fournisseur->id_frs . ',id_frs',
        ], [
            'tel_frs.unique' => 'Ce numéro existe déjà, veuillez insérer un autre.',
        ]);
        

        $fournisseur->update($request->all());

        return redirect()->route('fournisseurs.liste')->with('success', 'Fournisseur modifié avec succès.');
    }

    // Supprime un fournisseur existant
    public function supp_fournisseurs(Fournisseur $fournisseur)
    {
        $fournisseur->delete();
        return redirect()->route('fournisseurs.liste')->with('success', 'Fournisseur supprimé avec succès.');
    }
}
