<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaires extends Model
{
    use HasFactory;
    protected $fillable = [ 'commentaire_id', 	'utilisateur_id', 	'annonce_id', 	'commentaire' 	];
    public function utilisateurs() {
        return $this->hasMany(Utilisateur::class,'utilisateur_id');
    }
    public function annonce()
    {
        return $this->belongsTo(Annonces::class, 'annonce_id');
    }



}