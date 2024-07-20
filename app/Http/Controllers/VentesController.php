<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vente;
use App\Models\Sorti;
use App\Models\Client;
use App\Models\User;
use App\Models\Produit;
use App\Models\Boutique;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Dompdf\Dompdf;
use Dompdf\Options;

class VentesController extends Controller
{
    /**
     * Affiche la liste des ventes avec les détails associés.
     *
     * @return \Illuminate\View\View
     */
    public function liste()
    {
        $ventes = Vente::with(['client', 'boutique', 'user'])->get();
        return view('ventes.liste', compact('ventes'));
    }

    /**
     * Affiche le formulaire d'ajout de vente.
     *
     * @return \Illuminate\View\View
     */
    public function ajout()
    {
        $clients = Client::all();
        return view('ventes.ajout', compact('clients'));
    }

    /**
     * Valide et enregistre la première étape de la vente.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function enregistrer(Request $request)
    {
        $request->validate([
            'tel_client' => 'required|string|max:20',
        ]);

        $client = Client::where('tel_clt', $request->tel_client)->first();

        if (!$client) {
            return Redirect::route('clients.ajout')->withErrors(['tel_client' => 'Le numéro de téléphone n\'existe pas. Veuillez ajouter le client d\'abord.'])->withInput();
        }

        return redirect()->route('ventes.ajout2', ['client_id' => $client->id_clt]);
    }

    /**
     * Affiche le formulaire de la deuxième étape d'ajout de vente.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function ajout2(Request $request)
    {
        $client_id = $request->client_id;
        $users = User::all();
        $boutiques = Boutique::all();

        return view('ventes.ajout2', compact('users', 'boutiques', 'client_id'));
    }

    /**
     * Valide et enregistre la deuxième étape de la vente.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function enregistrer2(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id_clt',
            'user' => 'required|exists:users,id_users',
            'date' => 'required|date',
            'boutique' => 'required|exists:boutiques,id_bout',
        ]);

        $vente = new Vente();
        $vente->id_client = $request->client_id;
        $vente->id_users = $request->user;
        $vente->date_vente = $request->date;
        $vente->id_boutique = $request->boutique;
        $vente->montant_vente = $vente->calculerMontantTotal(); // Calcul du montant total
        
        $vente->save();
        

        // Rediriger vers la page d'ajout de sortie en passant l'ID de la boutique
    return redirect()->route('sortis.ajout1', ['id_vente' => $vente->id_vente, 'id_boutique' => $request->boutique])->with('success', 'Vente enregistrée avec succès.');
    }

    public function recu($id)
    {
        // Récupérer la vente spécifiée avec ses relations
        $vente = Vente::with(['client', 'boutique', 'user', 'sortis'])->findOrFail($id);
    
        // Données à passer à la vue du reçu
        $data = [
            'vente' => $vente,
        ];
    
        // Générer le PDF du reçu
        $pdfOptions = new Options();
        $pdfOptions->set('isHtml5ParserEnabled', true);
        $pdfOptions->set('isRemoteEnabled', true);

        $pdf = new Dompdf($pdfOptions);
        $pdf->loadHtml(View::make('ventes.recu', $data)->render());
        $pdf->setPaper('A4', 'portrait'); // Définir le format et l'orientation du papier
        $pdf->render();
    
        return $pdf->stream('recu_vente_'.$id.'.pdf'); // Afficher le PDF dans le navigateur avec un nom de fichier spécifique
    }
}
