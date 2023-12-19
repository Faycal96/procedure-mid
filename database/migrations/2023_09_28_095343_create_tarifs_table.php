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
        Schema::create('tarifs', function (Blueprint $table) {
            $table->ulid('uuid')->primary();
            $table->string("libelle")->nullable();
            $table->bigInteger('cout')->default(0);
            $table->ulid('demande_id')->nullable()->nullable();
            $table->foreign('demande_id')->references('uuid')->on('demandes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarifs');
    }
};
