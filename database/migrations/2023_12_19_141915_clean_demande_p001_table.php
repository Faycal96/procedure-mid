<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('demande_p001_s');
        Schema::create('demande_p001_s', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->string('libelle_court');
            $table->string('libelle_long')->nullable();

            $table->string("autre_type_construction")->string();
            $table->string("autre_usage_construction")->string();
            $table->boolean("is_underground")->default(false);
            $table->boolean("is_build")->default(false);

            $table->decimal("superficie")->default(0.0);
            $table->string("zone");
            $table->string("section");
            $table->string("secteur");
            $table->string("lot");
            $table->string("numero_parcelle");

            $table->uuid('type_construction_id')->nullable();
            $table->foreign('type_construction_id')->references('uuid')->on('type_constructions');

            $table->uuid('demande_id')->nullable();
            $table->foreign('demande_id')->references('uuid')->on('demandes');

            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->timestamps();
        });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('demande_p001_s', function (Blueprint $table) {
            $table->string('libelle_court');
            $table->string('libelle_long')->nullable();
            $table->string('etat')->nullable();
            $table->date('date_demande')->nullable();
            $table->string('identite', 100)->nullable();
            $table->string('beneficiaire')->nullable();
            $table->string('beneficiaire_piece_jointe')->nullable();
            $table->bigInteger('montant')->default(0);
            $table->date('delai')->nullable();
            $table->string('code')->nullable();
            $table->string('email')->nullable();

            $table->dropForeign('demandes_user_id_foreign');
            $table->dropColumn('user_id');
            $table->uuid('usager_id')->nullable();
            $table->foreign('usager_id')->references('uuid')->on('usagers');
            $table->string('last_modified_by')->nullable();
            $table->boolean('is_certified')->default(false);
            $table->dropColumn('confirmed');
            $table->string('adresse_beneficiaire')->nullable();

            $table->boolean('confirmed')->default(false);
            $table->date('date_certif')->nullable();

            $table->uuid('user_id')->nullable('');
            $table->foreign('user_id')->references('uuid')->on('users');

            $table->uuid('procedure_id')->nullable('procedures');
            $table->foreign('procedure_id')->references('uuid')->on('procedures');

            $table->uuid('type_demande_id')->nullable();
            $table->foreign('type_demande_id')->references('uuid')->on('type_demandes');
            
            $table->string("reference")->nullable();
            $table->string("output_file")->nullable();

            $table->boolean('paiement')->nullable();
            $table->string("note_etude_file")->nullable();

            $table->uuid('commune_id')->nullable();
            $table->foreign('commune_id')->references('uuid')->on('communes');

            $table->string('province_id')->nullable();
            $table->foreign('province_id')->references('uuid')->on('provinces')->onDelete('cascade');
        });
    }
};
