<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    protected $table = 'biens';
    protected $primaryKey = 'bien_id';
    protected $fillable = [
        'bien_id',
        'type_bien_id',
        'description',
        'photos',
        'tarif',
        'disponibilite',
        'ville_id',
    ];
    public function ville()
    {
        return $this->belongsTo(Ville::class, 'ville_id', 'ville_id'); // Update with actual name
    }

    public function annonces()
    {
        return $this->hasMany(Annonces::class);
    }
    public function annonceur()
    {
        return $this->belongsTo(Annonceur::class, 'annonceur_id', 'annonceur_id');
    }
}