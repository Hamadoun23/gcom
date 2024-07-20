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
        Schema::create('ventes', function (Blueprint $table) {
            $table->id('id_vente'); // Equivalent to $table->bigIncrements('id_vente')
            $table->date('date_vente');
            $table->decimal('montant_vente', 10, 2)->default(0);
            $table->unsignedBigInteger('id_client');
            $table->unsignedBigInteger('id_boutique');
            $table->unsignedBigInteger('id_users');
            $table->timestamps();

            // Clés étrangères
            $table->foreign('id_client')->references('id_clt')->on('clients');
            $table->foreign('id_boutique')->references('id_bout')->on('boutiques');
            $table->foreign('id_users')->references('id_users')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventes');
    }
};