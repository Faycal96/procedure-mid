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
        Schema::table('plaintes', function (Blueprint $table) {
            //
            $table->string('procedure')->nullable();
            $table->string('etat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plaintes', function (Blueprint $table) {
            $table->dropColumn('procedure');
            $table->dropColumn('etat');
        });
    }
};
