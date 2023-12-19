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
        Schema::create('services', function (Blueprint $table) {
            $table->ulid('uuid')->primary();
            $table->string('libelle_court')->nullable();
            $table->string('libelle_long')->nullable();
            $table->string('type')->nullable();
            $table->integer('ordre')->unsigned()->nullable();
            $table->boolean('etat')->default(true);
            $table->ulid('structure_id')->nullable();
            $table->foreign('structure_id')->references('uuid')->on('structures');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
