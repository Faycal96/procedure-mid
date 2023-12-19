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
        Schema::create('type_demandes', function (Blueprint $table) {
            $table->ulid('uuid')->primary();
            $table->string('libelle_court');
            $table->string('libelle_long')->nullable();
            $table->bigInteger('tarif')->default(0);
            $table->timestamps();

            $table->ulid('categorie_id')->nullable();
            $table->foreign('categorie_id')->references('uuid')->on('categories');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_demandes');
    }
};
