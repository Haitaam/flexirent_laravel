<?php
namespace App\Http\Controllers;

use App\Models\Annonceur;
use Illuminate\Http\Request;

class SocieteController extends Controller
{
public function show($id)
{
// Utilisez les noms de relation corrects : 'ville', 'annonces' et 'biens'
$societe = Annonceur::with(['ville', 'annonces', 'biens'])->findOrFail($id);
return view('societe.societe', compact('societe'));
}
}