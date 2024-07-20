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
        Schema::create('clients', function (Blueprint $table) {
            $table->id('id_clt'); // Clé primaire avec auto-incrémentation
            $table->string('prenom_clt', 50);
            $table->string('nom_clt', 50);
            $table->string('adresse_clt', 100)->nullable();
            $table->string('tel_clt', 20)->unique()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
