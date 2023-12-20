<?php

namespace App\Repositories;
use App\Models\Demande;
use Illuminate\Support\Facades\Storage;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class DemandeRepository.
 */
class DemandeRepository extends AppRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Demande::class;
    }


    
    public function uploadFile(array $data, string $name){


        $this->unsetClauses();

        $de = new Demande();
        $tt = $de->genererRandomString(4);

       $fileName = time().$tt.'.'.$data[$name]->getClientOriginalExtension();

        // $libelle = $data['libelle_court'];
        $libelle = 'demande';
        echo $libelle;
        $url = 'public/'.$libelle;
        Storage::makeDirectory($url);

        $path = $data[$name]->storeAs('public/'.$libelle, $fileName);

        return $path;
    }
}
