<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{

    public function reserve(Request $request, $annonce_id)
{
    // Trouvez l'annonce par son ID et stockez-la dans la session
    $annonce = \App\Models\Annonces::find($annonce_id);
    session(['reserved_annonce' => $annonce]);

    // Redirigez l'utilisateur vers la page de connexion
    return redirect()->route('login');
}


    public function index()
    {
        $annonces = Annonce::all();
        return view('annonces.index', compact('annonces'));
    }

    public function store(Request $request)
    {
        $annonce = new Annonce();
        $annonce->titre = $request->input('titre');
        $annonce->description = $request->input('description');
        $annonce->prix = $request->input('prix');
        $annonce->save();
        return redirect()->route('annonces.index');
    }
}