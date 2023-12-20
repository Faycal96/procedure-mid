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
        Schema::table('demande_p001_s', function (Blueprint $table) {
            $table->ulid("usage_construction_id")->nullable();
            $table->foreign('usage_construction_id')->references('uuid')->on('usage_constructions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('demande_p001_s', function (Blueprint $table) {
            $table->dropForeign('demande_p001_s_usage_construction_id_foreign');
            $table->dropColumn('usage_construction_id');
        });
    }
};
