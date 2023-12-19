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
        Schema::create('affectations', function (Blueprint $table) {
            $table->ulid('uuid')->primary();
            $table->ulid('agent_id')->nullable();
            $table->foreign('agent_id')->references('uuid')->on('agents');
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
        Schema::dropIfExists('affectations');
    }
};
