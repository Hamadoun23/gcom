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
        Schema::create('sortis', function (Blueprint $table) {
            $table->id('id_sortis'); // Clé primaire avec auto-increment
            $table->unsignedBigInteger('id_ventes'); // Référence à la vente
            $table->unsignedBigInteger('id_produit'); // Référence au produit
            $table->integer('qte_sortis'); // Quantité sortie
            $table->decimal('montant_sortis', 10, 2); // Montant sortie
            $table->string('libelle_sortis'); // Libellé sortie
            $table->timestamps(); // Champs created_at et updated_at

            // Clés étrangères
            $table->foreign('id_ventes')->references('id_vente')->on('ventes');
            $table->foreign('id_produit')->references('id_prod')->on('produits');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sortis');
    }
};