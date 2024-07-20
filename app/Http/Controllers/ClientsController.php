<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientsController extends Controller
{
    public function liste_clients()
    {
        $clients = Client::all();
        return view('clients.liste', compact('clients'));
    }

    public function ajout_clients()
    {
        return view('clients.ajout');
    }

    public function enregistrer_clients(Request $request)
    {
        $request->validate([
            'prenom_clt' => 'required|string|max:50',
            'nom_clt' => 'required|string|max:50',
            'adresse_clt' => 'nullable|string|max:100',
            'tel_clt' => 'nullable|string|max:20|unique:clients,tel_clt',
        ], [
            'tel_clt.unique' => 'Ce numéro existe déjà, veuillez insérer un autre.',
        ]);

        $client = Client::create($request->all());

        return redirect()->route('ventes.ajout')->with('success', 'Client ajouté avec succès. Continuez la vente.')->withInput(['tel_client' => $client->tel_clt]);
    }

    public function modif_clients($id_clt)
    {
        $client = Client::findOrFail($id_clt);
        return view('clients.modif', compact('client'));
    }

    public function mettre_a_jour(Request $request, $id_clt)
    {
        $request->validate([
            'prenom_clt' => 'required|string|max:50',
            'nom_clt' => 'required|string|max:50',
            'adresse_clt' => 'nullable|string|max:100',
            'tel_clt' => 'nullable|string|max:20|unique:clients,tel_clt,' . $id_clt . ',id_clt',
        ], [
            'tel_clt.unique' => 'Ce numéro existe déjà, veuillez insérer un autre.',
        ]);

        $client = Client::findOrFail($id_clt);
        $client->update($request->all());

        return redirect()->route('clients.liste')->with('success', 'Client modifié avec succès.');
    }

    public function supp_clients($id_clt)
    {
        $client = Client::findOrFail($id_clt);
        $client->delete();

        return redirect()->route('clients.liste')->with('success', 'Client supprimé avec succès.');
    }
}
