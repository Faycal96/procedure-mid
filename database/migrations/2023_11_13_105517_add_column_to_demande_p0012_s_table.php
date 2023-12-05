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
        Schema::table('demande_p0012_s', function (Blueprint $table) {
            $table->string("note_etude_file")->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('demande_p0012_s', function (Blueprint $table) {
            $table->dropColumn('note_etude_file');

        });
    }
};
