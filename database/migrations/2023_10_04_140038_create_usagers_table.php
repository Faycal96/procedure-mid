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
        Schema::create('usagers', function (Blueprint $table) {
            $table->ulid('uuid')->primary();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('nip')->nullable();
            $table->date('date_naissance')->nullable();
            $table->string('lieu_naisssance')->nullable();
            $table->string('nom_pere')->nullable();
            $table->string('nom_mere')->nullable();
            $table->string('pays')->nullable();
            $table->string('profession')->nullable();
            $table->string('domicile')->nullable();
            $table->string('adresse_bf')->nullable();
            $table->string('telephone')->nullable();
            $table->string('etat')->nullable();
            $table->string('code')->nullable();
            $table->string('ref_identite')->nullable();
            $table->string('nom_entreprise')->nullable();

            $table->ulid('type_usager_id')->nullable()->nullable();
            $table->foreign('type_usager_id')->references('uuid')->on('type_usagers');

            $table->ulid('type_identite_id')->nullable()->nullable();
            $table->foreign('type_identite_id')->references('uuid')->on('type_identites');

            $table->ulid('commune_origine_id')->nullable();
            $table->foreign('commune_origine_id')->references('uuid')->on('communes');

            $table->ulid('commune_residence_id')->nullable();
            $table->foreign('commune_residence_id')->references('uuid')->on('communes');

            $table->ulid('user_id')->nullable();
            $table->foreign('user_id')->references('uuid')->on('users')->onDelete('cascade');;

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usagers');
    }
};
