<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Boutique;
use App\Models\User;

class UsersController extends Controller
{
    public function liste_users()
    {
        $users = User::with(['boutiques'])->get();
        return view('users.liste', compact('users'));
    }

    public function ajout_users()
    {
        $boutiques = Boutique::all();
        return view('users.ajout', compact('boutiques'));
    }

    public function enregistrer_users(Request $request)
    {
        $request->validate([
            'prenom_users' => 'required|string|max:255',
            'nom_users' => 'required|string|max:255',
            'mot_de_passe' => 'required|string|unique:users,mot_de_passe',
            'tel_users' => 'required|string|unique:users,tel_users',
            'roles' => 'required|in:Caissier,Gerant,Admin',
            'id_boutique' => 'required|exists:boutiques,id_bout',
        ]);

        User::create([
            'prenom_users' => $request->prenom_users,
            'nom_users' => $request->nom_users,
            'mot_de_passe' => bcrypt($request->mot_de_passe), // Assurez-vous de hacher le mot de passe
            'tel_users' => $request->tel_users,
            'roles' => $request->roles,
            'id_boutique' => $request->id_boutique,
        ]);

        return redirect()->route('liste_users')->with('success', 'Utilisateur ajouté avec succès.');
    }

    public function supp_users($id_users)
    {
        $user = User::findOrFail($id_users);
        $user->delete();

        return redirect()->route('liste_users')->with('success', 'Utilisateur supprimé avec succès.');
    }

    public function modif_users($id_users)
    {
        $user = User::findOrFail($id_users);
        $boutiques = Boutique::all();
        return view('users.modif', compact('user', 'boutiques'));
    }

    public function update_users(Request $request, $id_users)
    {
        $user = User::findOrFail($id_users);

        $request->validate([
            'prenom_users' => 'required|string|max:255',
            'nom_users' => 'required|string|max:255',
            'mot_de_passe' => 'nullable|string',
            'tel_users' => 'required|string|unique:users,tel_users,' . $user->id_users . ',id_users', 
            'roles' => 'required|in:Caissier,Gerant,Admin',
            'id_boutique' => 'required|exists:boutiques,id_bout',
        ]);

        $user->prenom_users = $request->prenom_users;
        $user->nom_users = $request->nom_users;
        if ($request->filled('mot_de_passe')) {
            $user->mot_de_passe = bcrypt($request->mot_de_passe);
        }
        $user->tel_users = $request->tel_users;
        $user->roles = $request->roles;
        $user->id_boutique = $request->id_boutique;

        $user->save();

        return redirect()->route('liste_users')->with('success', 'Utilisateur modifié avec succès.');
    }
}
