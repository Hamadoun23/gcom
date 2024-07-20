<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    use HasFactory;

    protected $table = 'ventes';
    protected $primaryKey = 'id_vente';
    public $timestamps = true;

    protected $fillable = [
        'id_client',
        'id_users',
        'date_vente',
        'montant_vente',
        'id_produit',
        'id_boutique',
    ];

    // Relation avec le modèle Client
    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client', 'id_clt');
    }

    // Relation avec le modèle User (Utilisateur)
    public function user()
    {
        return $this->belongsTo(User::class, 'id_users', 'id_users');
    }

    // Relation avec le modèle Produit
    public function produit()
    {
        return $this->belongsTo(Produit::class, 'id_produit', 'id_prod');
    }

    // Relation avec le modèle Boutique
    public function boutique()
    {
        return $this->belongsTo(Boutique::class, 'id_boutique', 'id_bout');
    }

    // Relation avec le modèle Sorti
    public function sortis()
    {
        return $this->hasMany(Sorti::class, 'id_ventes', 'id_vente');
    }

    // Méthode pour calculer le montant total de la vente
    public function calculerMontantTotal()
    {
        return $this->sortis()->sum('montant_sortis');
    }
}
