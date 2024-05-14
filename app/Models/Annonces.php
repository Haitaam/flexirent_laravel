<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Annonces extends Model
{
    protected $table = 'annonces';
    protected $primaryKey = 'annonce_id';
    protected $fillable = [
                'annonceur_id', 'titre', 'description', 'type_bien_id', 'localisation',
                'prix_par_nuit', 'disponibilite', 'date_publication','photo','bien_id','likes'
            ];
            public function bien()
            {
                return $this->belongsTo(Bien::class, 'bien_id');
            }
            public function commentaires(){
                return $this->hasMany(Commentaires::class,'annonce_id');
            }
            public function annonceur()
            {
                return $this->belongsTo(Annonceur::class, 'annonceur_id');
            }

}