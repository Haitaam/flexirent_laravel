<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ville;

class VilleController extends Controller
{
    // Afficher la liste des villes
    public function index()
    {
        $villes = Ville::all()->sortBy('nom');
        return view('villes.index', compact('villes'));
    }

    // Autres méthodes du contrôleur (create, store, edit, update, destroy) restent inchangées
}