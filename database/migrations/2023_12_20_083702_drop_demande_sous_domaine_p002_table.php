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
        Schema::dropIfExists('demande_sous_domaine_p002_s');
        Schema::dropIfExists('demande_domaine_p002_s');
        Schema::table("demandes", function(Blueprint $table) {
            $table->dropForeign("demandes_type_demande_id_foreign");
            $table->dropColumn("type_demande_id");
        });
        Schema::table("type_demandes", function(Blueprint $table) {
            $table->dropForeign("type_demandes_categorie_id_foreign");
            $table->dropColumn("categorie_id");
        });
        Schema::dropIfExists('demande_p002_s');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('demande_categorie_p002_s');
        Schema::dropIfExists('type_demandes');
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
