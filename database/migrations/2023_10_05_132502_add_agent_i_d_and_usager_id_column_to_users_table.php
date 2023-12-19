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
            $table->ulid('agent_id')->nullable();
            $table->foreign('agent_id')->references('uuid')->on('agents')->onDelete('cascade');
            $table->ulid('usager_id')->nullable();
            $table->foreign('usager_id')->references('uuid')->on('usagers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_agent_id_foreign');
            $table->dropForeign('users_usager_id_foreign');
            $table->dropColumn('agent_id');
            $table->dropColumn('usager_id');
        });
    }
};
