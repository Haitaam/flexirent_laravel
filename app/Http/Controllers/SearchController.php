<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonceur;
use App\Models\Ville;

class SearchController extends Controller
{
public function search(Request $request)
{
$searchTerm = $request->input('search');
$annonceurs = Annonceur::query()
->where('societe', 'LIKE', "%{$searchTerm}%")
->orWhere('adresse_societe', 'LIKE', "%{$searchTerm}%")
->orWhere('telephone', 'LIKE', "%{$searchTerm}%")
->orWhereHas('ville', function ($query) use ($searchTerm) {
$query->where('nom', 'LIKE', "%{$searchTerm}%");
})
->get();

return view('welcome', compact('annonceurs','Bien','Annonces'));
}
}