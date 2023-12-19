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
        Schema::table('demandes', function (Blueprint $table) {
            $table->dropForeign('demandes_user_id_foreign');
            $table->dropColumn('user_id');
            $table->ulid('usager_id')->nullable();
            $table->foreign('usager_id')->references('uuid')->on('usagers');
            $table->string('last_modified_by')->nullable();
            $table->boolean('is_certified')->default(false);
            $table->dropColumn('confirmed');
            $table->string('adresse_beneficiaire')->nullable();
        });
        Schema::table('demande_p001_s', function (Blueprint $table) {
            $table->dropForeign('demande_p001_s_user_id_foreign');
            $table->dropColumn('user_id');
            $table->ulid('usager_id')->nullable();
            $table->foreign('usager_id')->references('uuid')->on('usagers');
            $table->string('last_modified_by')->nullable();
            $table->boolean('is_certified')->default(false);
            $table->dropColumn('confirmed');
            $table->string('adresse_beneficiaire')->nullable();
        });
        Schema::table('demande_p002_s', function (Blueprint $table) {
            $table->dropForeign('demande_p002_s_user_id_foreign');
            $table->dropColumn('user_id');
            $table->ulid('usager_id')->nullable();
            $table->foreign('usager_id')->references('uuid')->on('usagers');
            $table->string('last_modified_by')->nullable();
            $table->boolean('is_certified')->default(false);
            $table->dropColumn('confirmed');
            $table->string('adresse_beneficiaire')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('demandes', function (Blueprint $table) {
            $table->ulid('user_id')->nullable();
            $table->foreign('user_id')->references('uuid')->on('users');
            $table->boolean('confirmed')->default(false);
            $table->dropColumn('last_modified_by');
        });
        Schema::table('demande_p001_s', function (Blueprint $table) {
            $table->ulid('user_id')->nullable();
            $table->foreign('user_id')->references('uuid')->on('users');
            $table->boolean('confirmed')->default(false);
            $table->dropColumn('last_modified_by');
        });
        Schema::table('demande_p002_s', function (Blueprint $table) {
            $table->ulid('user_id')->nullable();
            $table->foreign('user_id')->references('uuid')->on('users');
            $table->boolean('confirmed')->default(false);
            $table->dropColumn('last_modified_by');
        });
    }
};
