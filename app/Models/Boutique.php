<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boutique extends Model
{
    use HasFactory;

    protected $table = 'boutiques'; // Nom de la table
    protected $primaryKey = 'id_bout'; // Clé primaire
    public $timestamps = false; // Si la table n'a pas de colonnes created_at et updated_at

    protected $fillable = [
        'nom_bout',
        'adresse_bout',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'id_bout', 'id_bout');
    }

    public function produits()
    {
        return $this->hasMany(Produit::class, 'id_boutique', 'id_bout');
    }

    public function achats()
    {
        return $this->hasMany(Achat::class, 'id_boutique', 'id_bout');
    }

    public function ventes()
    {
        return $this->hasMany(Vente::class, 'id_boutique', 'id_bout');
    }
}
