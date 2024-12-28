<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrateur;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Affichage du formulaire d'inscription
    public function showSignupForm()
    {
        return view('auth.signup');
    }



    
    // Traitement de l'inscription
    public function handleSignup(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:50',
            'email' => 'required|email|max:100|unique:clients',
            'mot_de_passe' => 'required|string|min:6|confirmed',
        ]);

        $client = Client::create([
            'Nom' => $request->nom,
            'Prenom' => $request->prenom,
            'Email' => $request->email,
            'Mot_de_passe' => Hash::make($request->mot_de_passe),
        ]);

        // Message de succès
        return redirect()->route('signin.form')->with('success', 'Votre inscription a été enregistrée avec succès!');
    }

    // Affichage du formulaire de connexion
    public function showSigninForm()
    {
        return view('auth.signin');
    }

    // Traitement de la connexion
    public function handleSignin(Request $request)
    {
        $request->validate([
            'identifiant' => 'required|string',
            'mot_de_passe' => 'required|string',
        ]);
    
        // Vérification pour l'administrateur
        $admin = Administrateur::where('Identifiant', $request->identifiant)->first();
        if ($admin && Hash::check($request->mot_de_passe, $admin->Mot_de_passe)) {
            Auth::login($admin);  // Connecter l'administrateur
            return redirect()->route('admin.dashboard');  // Rediriger vers la page admin
        }
    
        // Vérification pour le client
        $client = Client::where('Email', $request->identifiant)->first();
        if ($client && Hash::check($request->mot_de_passe, $client->Mot_de_passe)) {
            Auth::login($client);  // Connecter le client
            return redirect()->route('client.dashboard');  // Rediriger vers la page client
        }
    
        // Erreur si l'identifiant ou le mot de passe est incorrect
        return back()->withErrors(['identifiant' => 'Identifiant ou mot de passe incorrect']);
    }
    
}
