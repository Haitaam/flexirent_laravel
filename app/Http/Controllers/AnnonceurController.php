<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Annonceur;

class AnnonceurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $annonceur = Annonceur::select('annonceur_id', 'user_id', 'societe', 'adresse_societe', 'telephone' ,'photo')->with('user')->get();
        return view('annonceurs.index', compact('annonceur'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $annonceur = Annonceur::select('annonceur_id', 'user_id', 'societe', 'adresse_societe', 'telephone' ,'photo', 'ville_id')->with('user')->find($id);
        return view('annonceurs.show', compact('annonceur'));
    }
    public function store(Request $request)
    {
        $annonceur = Annonceur::create([
            'user_id' => $request->user_id,
            'societe' => $request->societe,
            'adresse_societe' => $request->adresse_societe,
            'telephone' => $request->telephone,
            'photo' => $request->photo
            'ville_id'=>$request->ville_id



        ]);

        return redirect()->route('annonceurs.index');
    }

    public function update(Request $request, $id)
    {
        $annonceur = Annonceur::findOrFail($id);
        $annonceur->update($request->all());
        return redirect()->route('annonceurs.index');
    }

    public function destroy($id)
    {
        $annonceur = Annonceur::findOrFail($id);
        $annonceur->delete();
        return redirect()->route('annonceurs.index');
    }
    public function create() { return view('annonceurs.create'); }
}