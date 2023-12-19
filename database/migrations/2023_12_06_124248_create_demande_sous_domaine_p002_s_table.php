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
        Schema::create('demande_sous_domaine_p002_s', function (Blueprint $table) {
            $table->ulid('uuid')->primary();
            $table->string('libelle_court');
            $table->string('libelle_long')->nullable();
            
            $table->ulid('demande_domaine_p002_id')->nullable();
            $table->foreign('demande_domaine_p002_id')->references('uuid')->on('demande_domaine_p002_s');
            
            $table->ulid('demande_categorie_p002_id')->nullable();
            $table->foreign('demande_categorie_p002_id')->references('uuid')->on('demande_categorie_p002_s');
             $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_sous_domaine_p002_s');
    }
};
