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
        Schema::create('achats', function (Blueprint $table) {
            $table->id('id_act'); // Clé primaire avec auto-increment
            $table->date('date_achat'); // Date d'achat
            $table->decimal('montant_achat', 10, 2)->default(0);
            $table->unsignedBigInteger('id_user'); // Référence à l'utilisateur
            $table->unsignedBigInteger('id_fournisseur'); // Référence au fournisseur
            $table->unsignedBigInteger('id_boutique'); // Référence à la boutique
            $table->timestamps(); // Champs created_at et updated_at


            // Clés étrangères sans suppression en cascade explicite
            $table->foreign('id_user')->references('id_users')->on('Users');
            $table->foreign('id_fournisseur')->references('id_frs')->on('fournisseurs');
            $table->foreign('id_boutique')->references('id_bout')->on('boutiques');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achats');
    }
};