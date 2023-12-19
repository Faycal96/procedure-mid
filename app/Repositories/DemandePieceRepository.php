<?php

namespace App\Repositories;

use App\Models\DemandePiece;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class DemandeP0011Repository.
 */
class DemandePieceRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return DemandePiece::class;
    }

    public function setChemin(string $chemin, string $demandeId,$libelle) {
        $demande = new DemandePiece();
        $demande->chemin = $chemin;
        $demande->libelle = $libelle;
        $demande->demande_id = $demandeId;
        $demande->save();
    }
}
