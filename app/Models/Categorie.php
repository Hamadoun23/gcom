<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $primaryKey = 'id_cat';
    public $timestamps = false;

    protected $fillable = ['nom_cat'];

    public function produits()
    {
        return $this->hasMany(Produit::class, 'id_categorie', 'id_cat');
    }
}
