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
        Schema::create('produits', function (Blueprint $table) {
            $table->id('id_prod');
            $table->string('libelle', 100)->unique(); // Ajout de la contrainte d'unicité;
            $table->text('description')->nullable();
            $table->decimal('prix_achat', 10, 2);
            $table->decimal('prix_vente', 10, 2);
            $table->integer('stock_actuel')->default(0); // Définition de la colonne avec une valeur par défaut
            $table->integer('stock_min');
            $table->integer('stock_max');
            $table->string('photo')->nullable();
            $table->unsignedBigInteger('id_categorie');
            $table->unsignedBigInteger('id_boutique');

            $table->foreign('id_categorie')->references('id_cat')->on('categories');
            $table->foreign('id_boutique')->references('id_bout')->on('boutiques');
    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
