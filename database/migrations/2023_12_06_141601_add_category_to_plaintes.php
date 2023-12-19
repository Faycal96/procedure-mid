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
            $table->uuid('user_id')->nullable();
            $table->foreign('user_id')->references('uuid')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plaintes', function (Blueprint $table) {
            $table->dropForeign('plaintes_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
};
