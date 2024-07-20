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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_users');
            $table->string('nom_users');
            $table->string('prenom_users');
            $table->string('mot_de_passe')->unique();
            $table->string('tel_users')->unique();
            $table->enum('roles', ['Caissier', 'Gerant', 'Admin']);
            $table->unsignedBigInteger('id_boutique'); // Utilisation de unsignedBigInteger pour la clé étrangère
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_boutique')->references('id_bout')->on('boutiques');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
