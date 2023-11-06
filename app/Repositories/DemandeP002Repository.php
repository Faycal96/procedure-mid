<?php

namespace App\Repositories;
use App\Models\DemandeP002;
use Faker\Core\File;
use Illuminate\Support\Facades\Storage;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class DemandeP002Repository.
 */
class DemandeP002Repository extends AppRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return DemandeP002::class;
    }
    public function all($filtre = array())
    {
        $this->newQuery()->eagerLoad();

        $models = $this->query->where($filtre)->get();

        $this->unsetClauses();

        return $models;
    }
    public function uploadFile($file) {
        $this->unsetClauses();
        $de = new DemandeP002();
        $tt = $de->genererRandomString(4);
        $fileName = time() . $tt . '.' . $file->getClientOriginalExtension();
        $libelle = 'demandeP002';
        echo $libelle;
        $url = 'public/' . $libelle;
        Storage::makeDirectory($url);
        $path = $file->storeAs('public/' . $libelle, $fileName);
        return $path;
    }
    

}
