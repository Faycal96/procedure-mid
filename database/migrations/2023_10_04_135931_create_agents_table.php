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
        Schema::create('agents', function (Blueprint $table) {
            $table->ulid('uuid')->primary();
            $table->string('matricule', 10)->nullable();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('fonction')->nullable();
            $table->date('date_affectation')->nullable();
            $table->date('date_naissance')->nullable();
            $table->date('date_prise_service')->nullable();
            $table->string('lieu_naissance')->nullable();

            $table->ulid('service_id')->nullable();
            $table->foreign('service_id')->references('uuid')->on('services');

            $table->ulid('user_id')->nullable();
            $table->foreign('user_id')->references('uuid')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};
