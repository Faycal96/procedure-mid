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
        Schema::table('demande_pieces', function (Blueprint $table) {
            $table->string('last_modified_by')->nullable();
        });
        Schema::table('paiements', function (Blueprint $table) {
            $table->string('last_modified_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('demande_pieces', function (Blueprint $table) {
            $table->dropColumn('last_modified_by');
        });
        
        Schema::table('paiements', function (Blueprint $table) {
            $table->dropColumn('last_modified_by');
        });
    }
};
