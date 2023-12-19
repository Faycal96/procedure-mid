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
        Schema::create('demandes', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->string('libelle_court');
            $table->string('libelle_long')->nullable();
            $table->string('etat')->nullable();
            $table->date('date_demande')->nullable();
            $table->string('identite', 100)->nullable();
            $table->string('beneficiaire')->nullable();
            $table->string('beneficiaire_piece_jointe')->nullable();
            $table->bigInteger('montant')->default(0);
            $table->date('delai')->nullable();
            $table->string('code')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();

            $table->boolean('confirmed')->default(false);
            $table->date('date_certif')->nullable();

            $table->uuid('user_id')->nullable('');
            $table->foreign('user_id')->references('uuid')->on('users');

            $table->uuid('procedure_id')->nullable('procedures');
            $table->foreign('procedure_id')->references('uuid')->on('procedures');

            $table->uuid('type_demande_id')->nullable();
            $table->foreign('type_demande_id')->references('uuid')->on('type_demandes');
            
            $table->string("reference")->nullable();
            $table->string("output_file")->nullable();

            $table->boolean('paiement')->nullable();
            $table->string("note_etude_file")->nullable();

            $table->uuid('commune_id')->nullable();
            $table->foreign('commune_id')->references('uuid')->on('communes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};
