<?php

namespace App\Repositories;

use App\Models\Demande;
use App\Models\DemandeP001;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class DemandeP001Repository.
 */
class DemandeP001Repository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return DemandeP001::class;
    }

    
    /**
     * Create a new model record in the database.
     *
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $data)
    {
        $demandeVar=Demande::create([
            "province_id"=>$data["province_id"],
            "commune_id"=>$data["commune_id"],
            "email"=>$data["email"],
            "etat"=>$data["etat"],
            "reference"=>$data["reference"],
            "delai"=>$data["delai"],
            "paiement"=>$data["paiement"],
            "usager_id"=>$data["usager_id"],
            "procedure_id"=>$data["procedure_id"],
            "is_certified"=>$data["is_certified"],
        ]);

        $demandeP001Var=DemandeP001::create([
            "demande_id"=>$demandeVar->uuid,
            "type_construction_id"=>$data["type_construction_id"],
            "is_underground"=>$data["is_underground"],
            "autre_usage_construction"=>$data["autre_usage_construction"],
            "superficie"=>$data["superficie"],
            "secteur"=>$data["secteur"],
            "numero_parcelle"=>$data["numero_parcelle"],
            "lot"=>$data["lot"],
            "section"=>$data["section"],
            "zone"=>$data["zone"],
            "is_build"=>$data["is_build"],
            "usage_construction_id"=>$data["usage_construction"],
        ]);
        $this->unsetClauses();

        return $demandeVar;
    }
}
