<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entree extends Model
{
    use HasFactory;

    // Le nom de la table associée au modèle
    protected $table = 'entrees';

    // Le nom de la clé primaire de la table
    protected $primaryKey = 'id_entree';

    // Les attributs qui sont assignables en masse
    protected $fillable = [
        'id_achat',
        'id_produit',
        'qte_entree',
        'montant_entree',
        'libelle_entree',
    ];

    // Les relations avec d'autres modèles
    public function achats()
    {
        return $this->belongsTo(Achat::class, 'id_achat', 'id_act');
    }

    public function produits()
    {
        return $this->belongsTo(Produit::class, 'id_produit', 'id_prod');
    }

}
