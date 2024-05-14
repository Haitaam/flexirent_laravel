<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Annonceur extends Model
{
    use HasFactory;

    // Définir le nom de la table
    protected $table = 'annonceur';
    protected $primaryKey = 'annonceur_id';

    protected $fillable = [
        'annonceur_id',
        'user_id',
        'societe',
        'adresse_societe',
        'telephone',
        'photo',
        'ville_id',
    ];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateurs::class, 'user_id');
    }
    public function ville()
    {
        return $this->belongsTo(Ville::class, 'ville_id');
    }

    public function annonces()
    {
        return $this->hasMany(Annonces::class, 'annonceur_id', 'annonceur_id');
    }

    public function biens() {
        return $this->hasMany(Bien::class, 'annonceur_id', 'annonceur_id');
    }

}