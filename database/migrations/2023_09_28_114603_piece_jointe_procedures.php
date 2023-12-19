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
        Schema::create('procedure_piece_jointes', function (Blueprint $table) {
            $table->ulid("procedure_id");
            $table->foreign('procedure_id')->references('uuid')->on('procedures');

            $table->ulid('piece_jointe_id');
            $table->foreign('piece_jointe_id')->references('uuid')->on('piece_jointes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('procedure_piece_jointes');
    }
};
