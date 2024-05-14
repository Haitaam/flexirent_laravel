<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use Illuminate\Http\Request;

class BienController extends Controller
{
    public function index()
    {
        $biens = Bien::all();
        return view('biens.index', compact('biens'));
    }
    public function showDetails($id)
    {
        // Logique pour récupérer les données nécessaires pour afficher les détails du bien
        $bien = Bien::find($id); // récupérez le bien à afficher par son ID

        // Vérifiez si le bien existe
        if (!$bien) {
            // Redirigez vers une page d'erreur ou faites quelque chose d'autre
            return redirect()->back()->with('error', 'Bien non trouvé.');
        }

        // Passez les données à la vue et retournez la vue
        return view('detbien', ['bien' => $bien]);
    }


}