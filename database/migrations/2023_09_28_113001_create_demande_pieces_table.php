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
        Schema::create('demande_pieces', function (Blueprint $table) {
            $table->ulid('uuid')->primary();
            $table->string("libelle")->nullable();
            $table->string("chemin")->nullable();
            $table->ulid('piece_jointe_id')->nullable();
            $table->foreign('piece_jointe_id')->references('uuid')->on('piece_jointes');

            $table->ulid('demande_id')->nullable();
            $table->foreign('demande_id')->references('uuid')->on('demandes');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_pieces');
    }
};
