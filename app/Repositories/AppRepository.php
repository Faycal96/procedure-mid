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
    public function uploadActe(array $data, string $name, $id){
        $this->unsetClauses();
        $de = null;
        $libelle = '';

    $tt = $this->genererRandomString(4);

       $fileName = time().$tt.'.'.$data[$name]->getClientOriginalExtension();
        $url = 'public/'.$libelle;
        Storage::makeDirectory($url);

        $path = $data[$name]->storeAs('public/'.$libelle, $fileName);
        Demande::find($id)->update(['output_file' => $path]);

    }

     //fonction de chargement de la note etude
     public function uploadNoteEtude( array $data, string $name, $id){
        $this->unsetClauses();
        $libelle = '';


         $tt = Demande::genererRandomString(4);
        if(!isEmpty($name)){
            $fileName = time().$tt.'.'.$data[$name]->getClientOriginalExtension();
            $url = 'public/'.$libelle;
            Storage::makeDirectory($url);

            $path = $data[$name]->storeAs('public/'.$libelle, $fileName);
            Demande::find($id)->update(['note_etude_file' => $path]);
        }

    }

 public function nombre($table, $champ=array())
    {

        return DB::table($table)->where($champ)->count();


    }
    function genererRandomString($longueur = 10) {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $longueur; $i++) {
            $index = mt_rand(0, strlen($caracteres) - 1);
            $randomString .= $caracteres[$index];
        }

        return $randomString;
    }
}
