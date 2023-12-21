<?php

namespace App\Repositories;
use App\Models\BaseJuridiques;
use Illuminate\Support\Facades\DB;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class BaseJuridiqueRepository.
 */
class BackendRepository extends AppRepository
{
    /**
     * @return string
     *  Return the model
     */

    public function model()
    {
        return BaseJuridiques::class;
    }

    public function nombreDemandeByProcedure($demande, $champ=array())
    {
        return 0;
        // return DB::table('procedures')
        //                     ->join($demande, 'procedures.uuid', '=', $demande.'.procedure_id')
        //                     ->where($champ)
        //                     ->count();
    }


    public function uuidProcedureByDemande($demande, $champ=array())
    {
        return 0;
        // return DB::table('procedures')
        //                     ->join($demande, 'procedures.uuid', '=', $demande.'.procedure_id')
        //                     ->select('procedures.*')
        //                     ->first();
    }

    

}
