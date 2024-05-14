<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;

    protected $table = 'utilisateurs';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'nom', 'prenom', 'email', 'mot_de_passe', 'date_inscription',
        'type_utilisateur', 'adresse', 'numero_telephone', 'date_naissance', 'ville_id'
    ];

    // Relation avec la ville
    public function ville()
    {
        return $this->belongsTo(Ville::class, 'ville_id');
    }
}