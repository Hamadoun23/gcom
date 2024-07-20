<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';
    protected $primaryKey = 'id_clt';
    public $timestamps = false;

    protected $fillable = [
        'prenom_clt',
        'nom_clt',
        'adresse_clt',
        'tel_clt',
    ];

    public function ventes()
    {
        return $this->hasMany(Vente::class, 'id_client', 'id_clt');
    }
}
