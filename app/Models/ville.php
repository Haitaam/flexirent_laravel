<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;

    protected $table = 'villes';
    protected $primaryKey = 'ville_id';
    public $timestamps = false; // Si la table ne contient pas de colonnes created_at et updated_at
    protected $dates = ['deleted_at'];

    protected $fillable = ['nom'];
    protected $visible = ['ville_id', 'nom', 'deleted_at'];
    protected $casts = ['deleted_at' => 'datetime'];

    public function bien()
    {
        return $this->hasOne(Bien::class, 'id', 'ville_id'); // Foreign key, local key (reversed)
    }
    
}
