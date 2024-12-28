<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrateur extends Model
{
    use HasFactory;

    // Spécifiez le nom de la table si elle est différente du nom du modèle en minuscule (c'est le cas ici)
    protected $table = 'administrateur';

    // Définir les attributs qui sont autorisés à être remplis (mass assignment)
    protected $fillable = [
        'Nom',
        'Prenom',
        'Identifiant',
        'Mot_de_passe',
    ];

    // Optionnel : Si vous utilisez des timestamps personnalisés
    public $timestamps = false; // La table n'a pas de colonnes `created_at` et `updated_at`
}
