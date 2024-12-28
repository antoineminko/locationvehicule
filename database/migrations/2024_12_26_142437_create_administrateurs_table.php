<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('administrateurs', function (Blueprint $table) {
            $table->id('D_Admin'); // Clé primaire pour l'administrateur
            $table->string('Nom'); // Colonne pour le nom de l'administrateur
            $table->string('Prenom'); // Colonne pour le prénom de l'administrateur
            $table->string('Identifiant')->unique(); // Colonne pour l'identifiant de l'administrateur
            $table->string('Mot_de_passe'); // Colonne pour le mot de passe de l'administrateur
            $table->timestamps(); // Colonnes created_at et updated_at
        });
    }

   /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('administrateurs');
    }
};
