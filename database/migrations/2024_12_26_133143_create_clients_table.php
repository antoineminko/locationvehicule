<?php

// Importation des classes nécessaires pour la migration.
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Définition de la classe de migration.
// La classe doit étendre `Migration` et implémenter la méthode `up` et `down`.
return new class extends Migration
{
    /**
     * Run the migrations.
     * La méthode `up()` est utilisée pour définir les changements que vous souhaitez apporter à la base de données.
     */
    public function up(): void
    {
        // Création de la table 'clients' dans la base de données.
        Schema::create('clients', function (Blueprint $table) {
            // Création d'une clé primaire auto-incrémentée (par défaut, Laravel crée une colonne `id` comme clé primaire).
            $table->id();
            
            // Ajout de la colonne 'Nom' de type chaîne de caractères (VARCHAR).
            $table->string('Nom');
            
            // Ajout de la colonne 'Prenom' de type chaîne de caractères (VARCHAR).
            $table->string('Prenom');
            
            // Ajout de la colonne 'Telephone' de type chaîne de caractères (VARCHAR).
            $table->string('Telephone');
            
            // Ajout de la colonne 'Email' de type chaîne de caractères (VARCHAR).
            $table->string('Email');
            
            // Ajout de la colonne 'Mot_de_passe' de type chaîne de caractères (VARCHAR).
            $table->string('Mot_de_passe');
            
            // Ajout des colonnes de timestamp : 'created_at' et 'updated_at'.
            // Ces colonnes sont automatiquement gérées par Laravel pour suivre la création et la mise à jour des enregistrements.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * La méthode `down()` est utilisée pour annuler les changements effectués dans la méthode `up()`.
     * Si vous avez créé une table, cette méthode doit supprimer cette table.
     */
    public function down(): void
    {
        // Suppression de la table 'clients' si elle existe.
        Schema::dropIfExists('clients');
    }
};
