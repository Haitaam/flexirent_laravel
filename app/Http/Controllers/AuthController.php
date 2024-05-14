<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Utilisateur; // Import Utilisateur model
use Illuminate\Support\Facades\Hash;

use Illuminate\Contracts\Auth\Authenticatable;

 class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth'); // Assuming this points to your login form view
    }

    public function login(Request $request)
{
    $credentials = $request->only('email', 'mot_de_passe'); // Extract email and password from request

    $utilisateur = Utilisateur::where('email', $credentials['email'])->first(); // Retrieve user by email from database

    // Check if user exists and password is correct
    if (!$utilisateur || !Hash::check($credentials['mot_de_passe'], $utilisateur->mot_de_passe)) {
        // Incorrect credentials, redirect back with error message
        return redirect()->back()->withErrors(['error' => 'Email ou mot de passe incorrect']);
    }
    if ($request->session()->has('reserved_annonce')) {
        $annonce = $request->session()->get('reserved_annonce');
        $request->session()->forget('reserved_annonce'); // Nettoyez la session
        return redirect()->route('reservations.create')->with('annonce', $annonce);
    }

    // Successful login, create session
    session()->put('user_id', $utilisateur->id);

    // Return view with user data and success message
    return view('utilisateurs.show', compact('utilisateur'))->with('success', 'Vous-etes connecter avec succes');
}



    public function logout()
    {
        session()->flush();

        return redirect()->route('welcome');
    }

}