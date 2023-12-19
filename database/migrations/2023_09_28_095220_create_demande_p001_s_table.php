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
        Schema::create('demande_p001_s', function (Blueprint $table) {
            $table->ulid('uuid')->primary();
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

            $table->boolean('is_producteur')->default(false);
            $table->boolean('is_distributeur')->default(false);
            $table->boolean('is_importateur')->default(false);
            $table->boolean('is_utilisateur')->default(false);

            $table->string('pays_fournisseur')->nullable();
            $table->string('id_produit')->nullable();
            $table->string('appelation_commercial')->nullable();
            $table->string('formule_chimique')->nullable();
            $table->string('destination_pays')->nullable();
            $table->string('utilisation_produit')->nullable();
            $table->string('aspect_produit')->nullable();
            $table->string('conditionnement_produit')->nullable();

            $table->double('poids', 15, 8)->default(0.0);
            $table->double('quantite')->unsigned()->default(0.0);


            $table->boolean('is_corrosif')->default(false);
            $table->boolean('is_iritant')->default(false);
            $table->boolean('is_toxic')->default(false);
            $table->boolean('is_inflammable')->default(false);
            $table->boolean('is_danger_env')->default(false);

            $table->string('type_local_stockage')->nullable();
            $table->string('capacite_stockage')->nullable();

            $table->boolean('is_regime_direct')->default(false);
            $table->boolean('is_sous_trait')->default(false);
            $table->boolean('is_agree')->default(false);
            $table->boolean('is_non_agree')->default(false);


            $table->ulid('user_id')->nullable();
            $table->foreign('user_id')->references('uuid')->on('users');

            $table->ulid('procedure_id')->nullable();
            $table->foreign('procedure_id')->references('uuid')->on('procedures');

            $table->ulid('type_demande_id')->nullable();
            $table->foreign('type_demande_id')->references('uuid')->on('type_demandes');

            $table->ulid('commune_id')->nullable();
            $table->foreign('commune_id')->references('uuid')->on('communes');

            $table->boolean('confirmed')->default(false);
            $table->date('date_certif')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_p001_s');
    }
};
