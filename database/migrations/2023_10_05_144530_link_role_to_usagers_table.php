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
        Schema::table('usagers', function (Blueprint $table) {
            $table->ulid('role_id')->nullable();
            $table->foreign('role_id')->references('uuid')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('usagers', function (Blueprint $table) {
            $table->dropForeign('usagers_role_id_foreign');
            $table->dropColumn('role_id');
        });
    }
};
