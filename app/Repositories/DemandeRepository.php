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


    // public function uploadFile(array $data, $file){

    //     //dd($data['file']->getClientOriginalName().  $data['file']->getClientOriginalExtension());die;
    //     $this->unsetClauses();
    //     // dd($data);
    //     $fileName = time().'.'.$data['procedure_id']. $data[$file]->getClientOriginalExtension(); 
    //     //$fileName = time().'.'.$data->file->extension(); 
        
    //     //creer un repertoire avec matricule comme nom 
    //     //on enregistre tous les fichiers du personnel concerné
    //     //$libelle = $data->libelle;
    //    // echo $data;
    //     // $libelle = $data['libelle_court'];
    //     // echo $libelle;
    //     // $url = 'public/'.$libelle;
    //     $url = 'public/'.$fileName;
    //     Storage::makeDirectory($url);
        
    //     //deplacer la photo dans le dossier créé
    //     //$data['file']->Storage::copy('app/public/'.$libelle, $fileName);

    //     $path = $data['procedure_id']->storeAs('public/'.$libelle, $fileName);
    //     //ajouter lutilisateur connecté et le filename pour la création de personnel 
    //     //$request->merge(['Utilisateurs_id' => auth()->user()->id, 'photo' => $fileName]);
    //     return $path;
    // }

    
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
