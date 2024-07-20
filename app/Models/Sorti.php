<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sorti extends Model
{
    use HasFactory;

    protected $table = 'sortis';
    protected $primaryKey = 'id_sortis';
    public $timestamps = true;

    protected $fillable = [
        'id_ventes',
        'id_produit',
        'qte_sortis',
        'montant_sortis',
        'libelle_sortis',
    ];

    // Relation avec le modèle Vente
    public function vente()
    {
        return $this->belongsTo(Vente::class, 'id_ventes', 'id_vente');
    }

    // Relation avec le modèle Produit
    public function produit()
    {
        return $this->belongsTo(Produit::class, 'id_produit', 'id_prod');
    }
}
