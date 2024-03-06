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
        Schema::create('motif_demandes', function (Blueprint $table) {
           // $table->ulid('uuid')->primary();
            $table->ulid('demande_id')->nullable();
            $table->ulid('motif_id')->nullable();

            $table->string("commentaire")->nullable();

            $table->foreign('demande_id')->references('uuid')->on('demandes');
            $table->foreign('motif_id')->references('uuid')->on('motifs');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motif_demandes');
    }
};
