<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Boutique;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
     $request->validate([
            'tel_users' => 'required|string',
            'mot_de_passe' => 'required|string',
            
        ]);
    
        $credentials = $request->only('tel_users', 'mot_de_passe');

        if (!Auth::attempt(['tel_users' => $credentials['tel_users'], 'password' => $credentials['mot_de_passe']])) {
            return redirect()->intended('/');
        }
        else{

 return redirect()->intended('/');
        }

        return back()->withErrors([
            'tel_users' => 'Les informations d\'authentification ne correspondent pas.',
        ]);
    }

    public function showRegisterForm()
    {
        $boutiques = Boutique::all();
        return view('auth.register', compact('boutiques'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'nom_users' => 'required|string|max:255',
            'prenom_users' => 'required|string|max:255',
            'tel_users' => 'required|string|max:255|unique:users',
            'mot_de_passe' => 'required|string|min:3',
            'id_boutique' => 'required|exists:boutiques,id_bout',
            'roles' => 'required|in:Caissier,Gerant,Admin',
        ]);

        $user = User::create([
            'nom_users' => $request->nom_users,
            'prenom_users' => $request->prenom_users,
            'tel_users' => $request->tel_users,
            'mot_de_passe' => Hash::make($request->mot_de_passe),
            'id_boutique' => $request->id_boutique,
            'roles' => $request->roles,
        ]);

        Auth::login($user);

        return redirect()->intended('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
