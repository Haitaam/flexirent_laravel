<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;

class UtilisateurController extends Controller
{

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $status = Password::sendResetLink(
            $request->only('email'),
            function ($user, $token) {
                // Send the password reset email.
                $user->notify(new \App\Notifications\PasswordResetNotification($token));
            }
        );

        return response()->json([
            'status' => $status,
        ]);
    }
    // Afficher la liste des utilisateurs
    public function index()
    {
        $utilisateurs = Utilisateur::all();

        // Manipuler les données ici si nécessaire
        $utilisateurs->each(function ($utilisateur) {
            $utilisateur->setAttribute('nomComplet', $utilisateur->nom . ' ' . $utilisateur->prenom);
        });

        // Tri par nom complet
        $utilisateurs = $utilisateurs->sortBy('nomComplet')->values();

        // Passer les données à la vue
        return view('utilisateurs.index', compact('utilisateurs'));
    }

    // Afficher le formulaire de création d'un nouvel utilisateur
    public function create()
    {
        return view('utilisateurs.create');
    }

    // Enregistrer un nouvel utilisateur

    public function store(Request $request) // Use custom validation request (optional)
    {
        $data = $request->only(['nom', 'prenom', 'email', 'mot_de_passe', 'adresse', 'numero_telephone', 'date_naissance', 'type_utilisateur', 'ville_id']);
        $data['mot_de_passe'] = Hash::make($data['mot_de_passe']); // Secure password hashing

        if (!isset($data['ville_id'])) {
            $data['ville_id'] = null;
        }
        $data['date_inscription'] = now();

        $utilisateur = new Utilisateur();
        $utilisateur->nom = $data['nom'];
        $utilisateur->prenom = $data['prenom'];
        $utilisateur->email = $data['email'];
        $utilisateur->mot_de_passe = $data['mot_de_passe'];
        $utilisateur->adresse = $data['adresse'];
        $utilisateur->numero_telephone = $data['numero_telephone'];
        $utilisateur->date_naissance = $data['date_naissance'];
        $utilisateur->type_utilisateur = $data['type_utilisateur'];
        $utilisateur->ville_id = $data['ville_id'];
        $utilisateur->date_inscription = $data['date_inscription'];

        $utilisateur->save();

        return redirect()->route('welcome')->with('success', 'Utilisateur créé avec succès');
    }








    // Afficher les détails d'un utilisateur
    public function show($id)
    {
        $utilisateur = Utilisateur::findOrFail($id);
        return view('utilisateurs.show', compact('utilisateur'));
    }

    // Afficher le formulaire de mise à jour d'un utilisateur
    public function edit($id)
    {
        $utilisateur = Utilisateur::findOrFail($id);
        return view('utilisateurs.edit', compact('utilisateur'));
    }

    // Mettre à jour un utilisateur existant
    public function update(Request $request, $id)
    {
        // Validation des données de formulaire ici si nécessaire
        $utilisateur = Utilisateur::findOrFail($id);
        $utilisateur->update($request->all());
        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur mis à jour avec succès');
    }

    // Supprimer un utilisateur
    public function destroy($id)
    {
        $utilisateur = Utilisateur::findOrFail($id);
        $utilisateur->delete();
        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur supprimé avec succès');
    }


public function customLogin(Request $request)
{
    // Valider les données de connexion ici
    $credentials = $request->only('email', 'password');

    // Tenter la connexion
    if (Auth::attempt(['email' => $credentials['email'], 'mot_de_passe' => $credentials['password']])) {
        // Connexion réussie
        return redirect()->intended('welcome');
    }

    // Connexion échouée
    return back()->withErrors([
        'email' => 'Les informations fournies ne correspondent pas à nos enregistrements.',
    ]);
}

}
