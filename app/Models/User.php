<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nom_users', 'prenom_users', 'tel_users', 'mot_de_passe', 'id_boutique', 'roles'
    ];

    protected $hidden = [
        'mot_de_passe',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function boutiques()
    {
        return $this->belongsTo(Boutique::class, 'id_boutique', 'id_bout');
    }

    public function ventes()
    {
        return $this->hasMany(Vente::class, 'id_user', 'id_users');
    }

    public function achats()
    {
        return $this->hasMany(Achat::class, 'id_user', 'id_users');
    }
}
