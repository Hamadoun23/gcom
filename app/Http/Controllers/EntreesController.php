<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entree;
use App\Models\Produit;
use App\Models\Achat;

class EntreesController extends Controller
{
    public function ajout1($id_act, Request $request)
{
    $boutiqueId = $request->input('id_boutique');
    $produits = Produit::where('id_boutique', $boutiqueId)->get();

    return view('entrees.ajout1', [
        'id_act' => $id_act,
        'produits' => $produits
    ]);
}

public function enregistrerEntree(Request $request)
{
    $request->validate([
        'id_act' => 'required|exists:achats,id_act',
        'produit' => 'required|array',
        'produit.*' => 'exists:produits,id_prod',
    ]);

    $idAct = $request->input('id_act');
    $produitsValid = false;

    foreach ($request->produit as $key => $idProduit) {
        $quantiteAjout = $request->quantite[$key];
        $produit = Produit::findOrFail($idProduit);

        // Validation des quantités seulement pour les produits sélectionnés
        if (is_numeric($quantiteAjout) && $quantiteAjout > 0) {
            $produitsValid = true;

            // Vérifier si la quantité ajoutée dépasse le stock maximal
            if ($quantiteAjout > $produit->stock_max || ($produit->stock_actuel + $quantiteAjout) > $produit->stock_max) {
                return back()->withErrors(['quantite.' . $key => 'Vous ne pouvez pas ajouter plus que ' . $produit->stock_max . ' ' . $produit->libelle]);
            }

            $entree = new Entree();
            $entree->id_achat = $idAct;
            $entree->id_produit = $idProduit;
            $entree->qte_entree = $quantiteAjout;
            $entree->montant_entree = $produit->prix_achat * $quantiteAjout; // Calculer le montant pour chaque entrée
            $entree->libelle_entree = $produit->libelle;
            $entree->save();

            // Mettre à jour le stock actuel du produit
            $produit->stock_actuel += $quantiteAjout;
            $produit->save();
        }
    }

    if (!$produitsValid) {
        return back()->withErrors(['produit' => 'Veuillez sélectionner au moins un produit avec une quantité supérieure à zéro.']);
    }

    // Mettre à jour le montant total de l'achat
    $achat = Achat::findOrFail($idAct);
    $achat->montant_achat = $achat->calculerMontantTotal();
    $achat->save();

    return redirect()->route('achats.liste')->with('success', 'Entrées enregistrées avec succès.');
}

}
