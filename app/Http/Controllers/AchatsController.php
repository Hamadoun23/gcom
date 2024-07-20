<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Achat;
use App\Models\Boutique;
use App\Models\Fournisseur;
use App\Models\User;
use App\Models\Entree;
use App\Models\Produit;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Dompdf\Options;

class AchatsController extends Controller
{
    public function liste()
    {
        // Récupérer tous les achats avec leurs relations
        $achats = Achat::with(['fournisseur', 'boutique', 'user'])->get();

        // Passer les achats à la vue
        return view('achats.liste', compact('achats'));
    }
    
    public function ajout()
    {
        // Récupérer les fournisseurs, les utilisateurs et les boutiques depuis la base de données
        $fournisseurs = Fournisseur::all();
        $boutiques = Boutique::all();
        $users = User::all();

        // Passer les fournisseurs, les utilisateurs et les boutiques à la vue
        return view('achats.ajout', compact('fournisseurs', 'boutiques', 'users'));
    }

    public function enregistrer(Request $request)
    {
        $request->validate([
            'fournisseur' => 'required',
            'date' => 'required|date',
            'user' => 'required',
            'boutique' => 'required',
        ]);

        // Créer un nouvel achat
        $achat = new Achat();
        $achat->id_fournisseur = $request->fournisseur;
        $achat->date_achat = $request->date;
        $achat->id_user = $request->user;
        $achat->id_boutique = $request->boutique;

        $achat->save();
        
        // Rediriger vers la liste des achats après l'enregistrement
    return redirect()->route('entrees.ajout1', ['id_act' => $achat->id_act, 'id_boutique' => $achat->id_boutique])->with('success', 'Achat enregistré avec succès.');
    }

    public function facture($id_act)
    {
        // Récupérer l'achat spécifié avec ses relations, y compris les entrées
        $achat = Achat::with(['fournisseur', 'boutique', 'user', 'entrees'])->findOrFail($id_act);
    
        // Données à passer à la vue de la facture
        $data = [
            'achat' => $achat,
        ];
    
        // Générer le PDF de la facture
        $pdf = new Dompdf();
        $pdf->loadHtml(View::make('achats.facture', $data));
        $pdf->setPaper('A4', 'portrait'); // Définir le format et l'orientation du papier
        $pdf->render();
    
        return $pdf->stream('facture.pdf'); // Afficher le PDF dans le navigateur
    }
}
