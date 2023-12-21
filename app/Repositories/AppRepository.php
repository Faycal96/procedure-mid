<?php

namespace App\Repositories;
use App\Models\BaseJuridiques;
use App\Models\DemandeP001;
use App\Models\DemandeP0011;
use App\Models\DemandeP0012;
use App\Models\DemandeP002;
use App\Models\DemandeP003;
use App\Models\DemandeP004;
use App\Models\DemandeP005;
use App\Models\DemandeP006;
use App\Models\DemandeP007;
use App\Models\DemandeP008;
use App\Models\Demande;
use Illuminate\Support\Facades\DB;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\UploadedFile;

use function PHPUnit\Framework\isEmpty;

//use Your Model

/**
 * Class BaseJuridiqueRepository.
 */
class AppRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */

    public function model()
    {

    }

    public function generateReference($codeProcedure)
    {
        return 'DOC'.$codeProcedure.Carbon::parse(Carbon::now())->format('YmdHis');
    }

    //fonction de chargement
    public function uploadActe($table, array $data, string $name, $id){
        $this->unsetClauses();
        $de = null;
        $libelle = '';
        switch ($table) {
            case 'demande_p001_s':
                $de = new DemandeP001();
                $libelle = 'demandeP001';
                break;
            case 'demande_p002_s':
                $de = new DemandeP002();
                $libelle = 'demandeP002';
                break;
            default:
                break;
        }


    $tt = $de->genererRandomString(4);

       $fileName = time().$tt.'.'.$data[$name]->getClientOriginalExtension();
        $url = 'public/'.$libelle;
        Storage::makeDirectory($url);

        $path = $data[$name]->storeAs('public/'.$libelle, $fileName);
        DB::table($table)->where('uuid', $id)->update(['output_file' => $path]);

    }

     //fonction de chargement de la note etude
     public function uploadNoteEtude($table, array $data, string $name, $id){
        $this->unsetClauses();
        $de = null;
        $libelle = '';
        switch ($table) {
            case 'demande_p001_s':
                $de = new DemandeP001();
                $libelle = 'demandeP001';
                break;
            case 'demande_p002_s':
                $de = new DemandeP002();
                $libelle = 'demandeP002';
                break;
            default:
                break;
        }


         $tt = $de->genererRandomString(4);
        if(!isEmpty($name)){
            $fileName = time().$tt.'.'.$data[$name]->getClientOriginalExtension();
            $url = 'public/'.$libelle;
            Storage::makeDirectory($url);

            $path = $data[$name]->storeAs('public/'.$libelle, $fileName);
            DB::table($table)->where('uuid', $id)->update(['note_etude_file' => $path]);
        }



    }

    public function nombre($table, $champ=array())
    {

        return DB::table($table)->where($champ)->count();


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

    public function uploadAFile(UploadedFile $data){


        $this->unsetClauses();

        $de = new Demande();
        $tt = $de->genererRandomString(4);

       $fileName = time().$tt.'.'.$data->getClientOriginalExtension();

        // $libelle = $data['libelle_court'];
        $libelle = 'demande';
        echo $libelle;
        $url = 'public/'.$libelle;
        Storage::makeDirectory($url);

        $path = $data->storeAs('public/'.$libelle, $fileName);

        return $path;
    }

}
