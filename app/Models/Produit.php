<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $table = 'produits';
    protected $primaryKey = 'id_prod';
    public $timestamps = false;

    protected $fillable = [
        'libelle',
        'description',
        'prix_achat',
        'prix_vente',
        'stock_actuel',
        'stock_min',
        'stock_max',
        'photo',
        'id_categorie',
        'id_boutique'
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'id_categorie', 'id_cat');
    }

    public function boutique()
    {
        return $this->belongsTo(Boutique::class, 'id_boutique', 'id_bout');
    }

    public function ventes()
    {
        return $this->hasMany(Vente::class, 'id_produit', 'id_prod');
    }

    public function entrees()
    {
        return $this->hasMany(Entree::class, 'id_produit', 'id_prod');
    }

    public function sortis()
    {
        return $this->hasMany(Sorti::class, 'id_produit', 'id_prod');
    }
}
