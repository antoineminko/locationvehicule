<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Inscription
    public function signup(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email|unique:client',
            'telephone' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        Client::create([
            'Nom' => $request->nom,
            'Prenom' => $request->prenom,
            'Email' => $request->email,
            'Telephone' => $request->telephone,
            'Mot_de_passe' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Inscription réussie !');
    }

    // Connexion
    public function signin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = Client::where('Email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->Mot_de_passe)) {
            // Authentification réussie
            return redirect()->back()->with('success', 'Connexion réussie !');
        } else {
            return redirect()->back()->with('error', 'Identifiants invalides.');
        }
    }
}
