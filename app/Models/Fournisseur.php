<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;

    // Le nom de la table associée au modèle
    protected $table = 'fournisseurs';

    // Le nom de la clé primaire de la table
    protected $primaryKey = 'id_frs';

    // Les attributs qui sont assignables en masse
    protected $fillable = [
        'prenom_frs',
        'nom_frs',
        'adresse_frs',
        'tel_frs',
    ];

        // Définir la relation entre Fournisseur et Achat
        public function achats()
        {
            return $this->hasMany(Achat::class, 'id_fournisseur', 'id_frs');
        }
}
