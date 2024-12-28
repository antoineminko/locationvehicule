<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    // Définir la table associée
    protected $table = 'client';

    // Clé primaire
    protected $primaryKey = 'ID_Client';

    // Définir les champs remplissables (fillable)
    protected $fillable = [
        'Nom',
        'Prenom',
        'Telephone',
        'Email',
        'Mot_de_passe',
    ];

    // Désactiver timestamps si vous n'avez pas de colonnes created_at et updated_at
    public $timestamps = false;
}
