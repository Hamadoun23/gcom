<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achat extends Model
{
    use HasFactory;

    // Le nom de la table associée au modèle
    protected $table = 'achats';

    // Le nom de la clé primaire de la table
    protected $primaryKey = 'id_act';

    // Les attributs qui sont assignables en masse
    protected $fillable = [
        'id_fournisseur',
        'date_achat',
        'id_user',
        'id_boutique',
        
    ];

    // Les relations avec d'autres modèles
    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class, 'id_fournisseur', 'id_frs');
    }

    public function boutique()
    {
        return $this->belongsTo(Boutique::class, 'id_boutique', 'id_bout');
    }

    public function entrees()
    {
        return $this->hasMany(Entree::class, 'id_achat', 'id_act');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_users');
    }

        // Méthode pour calculer le montant total de l'achat
        public function calculerMontantTotal()
        {
            return $this->entrees()->sum('montant_entree');
        }
}
