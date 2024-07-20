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
        Schema::create('entrees', function (Blueprint $table) {
            $table->id('id_entree'); // Clé primaire avec auto-increment
            $table->unsignedBigInteger('id_achat'); // Référence à l'achat
            $table->unsignedBigInteger('id_produit'); // Référence au produit
            $table->integer('qte_entree'); // Quantité entrée
            $table->decimal('montant_entree', 10, 2); // Montant entrée
            $table->string('libelle_entree'); // Libellé entrée
            $table->timestamps(); // Champs created_at et updated_at

            // Clés étrangères
            $table->foreign('id_achat')->references('id_act')->on('achats');
            $table->foreign('id_produit')->references('id_prod')->on('produits');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entree');
    }
};
