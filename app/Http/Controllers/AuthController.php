<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Utilisateur; // Import Utilisateur model

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('mot_de_passe');

        // User retrieval and validation (consider creating a separate function)
        $utilisateur = $this->validateCredentials($email, $password);

        // Successful login, create session
        session()->put('user_id', $utilisateur->id);

        $reservedAnnonce = $request->session()->get('reserved_annonce_data');
        if ($reservedAnnonce) {
            $request->session()->forget('reserved_annonce_data');
            return redirect()->route('reservations.create')->with('annonce', $reservedAnnonce);
        }

        // Return view with user data and success message (adjust based on your view structure)
        return redirect()->intended('/')->with('success', 'Vous-êtes connecté avec succès');
    }

    protected function validateCredentials(string $email, string $password): Utilisateur
    {
        $utilisateur = Utilisateur::where('email', $email)->first();

        if (!$utilisateur || !Hash::check($password, $utilisateur->mot_de_passe)) {
            abort(401, 'Email ou mot de passe incorrect');
        }

        return $utilisateur;
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();

        return redirect()->route('welcome');
    }
}