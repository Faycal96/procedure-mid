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
            $table->dropColumn('name');
            $table->dropColumn('email');
            $table->dropColumn('phone');

            $table->ulid('usager_id')->nullable();
            $table->foreign('usager_id')->references('uuid')->on('usagers')->onDelete('cascade');

            $table->text('commentaire')->nullable();
            //$table->renameColumn('category', 'procedure');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plaintes', function (Blueprint $table) {
            //
            $table->dropColumn('usager_id');
            //$table->renameColumn('procedure', 'category');
        });
    }
};
