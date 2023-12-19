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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->ulid('commune_origine_id')->nullable();
            $table->foreign('commune_origine_id')->references('uuid')->on('communes');

            $table->ulid('commune_residence_id')->nullable();
            $table->foreign('commune_residence_id')->references('uuid')->on('communes');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('commune_origine');
            $table->dropColumn('commune_residence');
        });
    }
};
