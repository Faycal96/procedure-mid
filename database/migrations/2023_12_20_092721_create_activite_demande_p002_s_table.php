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
        Schema::create('activite_demande_p002_s', function (Blueprint $table) {
            $table->ulid("uuid")->primary();

            $table->string("localisation")->nullable();
            $table->string("designation")->nullable();
            $table->string("maitre_ouvrage")->nullable();
            $table->date("date_debut")->nullable();
            $table->date("date_fin")->nullable();
            $table->unsignedBigInteger("montany_travaux")->nullable();
            $table->string("nature")->nullable();
            $table->string("condition")->nullable();
            $table->decimal("pourcentage_montant_total")->nullable();
            $table->text("observations")->nullable();

            $table->ulid('demande_p002_id')->nullable();
            $table->foreign('demande_p002_id')->references('uuid')->on('demande_p002_s');

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
        Schema::dropIfExists('activite_demande_p002_s');
    }
};
