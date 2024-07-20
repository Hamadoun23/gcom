<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sorti;
use App\Models\Produit;
use App\Models\Vente;

class SortisController extends Controller
{
    public function ajout1($id_vente, Request $request)
    {
        // Obtenir la vente pour récupérer la boutique
        $vente = Vente::findOrFail($id_vente);

        // Filtrer les produits en fonction de la boutique de la vente
        $produits = Produit::where('id_boutique', $vente->id_boutique)->get();

        return view('sortis.ajout1', [
            'id_vente' => $id_vente,
            'produits' => $produits
        ]);
    }

    public function enregistrerSortis(Request $request)
    {
        $request->validate([
            'id_vente' => 'required|exists:ventes,id_vente',
            'produit' => 'required|array',
            'produit.*' => 'exists:produits,id_prod',
            'quantite' => 'required|array',
            'quantite.*' => 'integer|min:1',
        ]);

        $idVente = $request->input('id_vente');

        foreach ($request->produit as $key => $idProduit) {
            $produit = Produit::findOrFail($idProduit);

            // Vérifier si le stock actuel est suffisant
            if ($request->quantite[$key] > $produit->stock_actuel) {
                return back()->withErrors(['quantite.' . $key => 'Stock insuffisant pour ' . $produit->libelle]);
            }

            $sorti = new Sorti();
            $sorti->id_ventes = $idVente;
            $sorti->id_produit = $idProduit;
            $sorti->qte_sortis = $request->quantite[$key];
            $sorti->montant_sortis = $produit->prix_vente * $request->quantite[$key]; // Calculer le montant pour chaque sortie
            $sorti->libelle_sortis = $produit->libelle;
            $sorti->save();

            $produit->stock_actuel -= $request->quantite[$key];
            $produit->save();
        }

        // Mettre à jour le montant total de la vente
        $vente = Vente::findOrFail($idVente);
        $vente->montant_vente = $vente->calculerMontantTotal();
        $vente->save();

        return redirect()->route('ventes.liste')->with('success', 'Sorties enregistrées avec succès.');
    }
}
