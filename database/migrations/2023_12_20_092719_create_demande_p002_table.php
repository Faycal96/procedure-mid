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
        Schema::create('demande_p002_s', function (Blueprint $table) {
            $table->ulid("uuid")->primary();
            
            $table->string("numero_cnss_entreprise")->nullable();
            $table->ulid('demande_id')->nullable();
            $table->foreign('demande_id')->references('uuid')->on('demandes');

            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->timestamps();
        });
        Schema::table("demandes", function(Blueprint $table){
            $table->string("objectif_demande");
            $table->string("raison_social")->nullable();
            $table->string("siege_social")->nullable();
            $table->string("fax")->nullable();
            $table->string("boite_postale")->nullable();
            $table->string("adresse_physique")->nullable();
            $table->string("tel_1")->nullable();
            $table->string("tel_2")->nullable();
            $table->string("tel_3")->nullable();
            $table->string("email_entreprise")->nullable();
            
            $table->string("nom_representant")->nullable();
            $table->string("prenom_representant")->nullable();
            $table->string("fonction_representant")->nullable();
            $table->string("adresse_representant")->nullable();

            $table->ulid('categorie_id')->nullable();
            $table->foreign('categorie_id')->references('uuid')->on('categorie_demandes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_p002_s');
    }
};
