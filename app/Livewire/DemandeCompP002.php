<?php

namespace App\Livewire;

use App\Models\Commune;
use App\Models\Pays;
use App\Models\Demande;
use App\Models\DemandeCategorieP002;
use App\Models\DemandeDomaineP002;
use App\Models\DemandeSousDomaineP002;
use App\Models\Procedure;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Intervention\Image\Facades\Image;
use Symfony\Component\VarDumper\VarDumper;

class DemandeCompP002 extends Component
{

    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = "bootstrap";

    public $libelle_court;
    public $libelle_long;
    public $cnib;
    public $adresse;



    public $newDemande = [];
    public $editDemande = [];
    public $document1 = null;
    public $document2 = null;
    public $search;
    public $updateMode = false;
    public $currentPage = PAGECREATEFORM;

    public function render()
    {



        Carbon::setLocale("fr");

        $searchCriteria = "%".$this->search."%";
        $procedure = Procedure::where("code", request()->segment(1))->first();
        $data = [
            "procedure" => $procedure,
            "demandes" => Demande::where("libelle_court", "like", $searchCriteria)->latest()->paginate(5),
            "telephone" => Auth::user()->telephone,
            "communes" => Commune::all(),
            "pays" => Pays::all(),
            // "identite" => Auth::user()->usager->nom. ' '.  Auth::user()->usager->prenom,
           // "default_pays" => Auth::user()->usager->pays,
            "domaines" => DemandeDomaineP002::all(),
            "categories" => DemandeCategorieP002::all(),
            "sousDomianes" => DemandeSousDomaineP002::all(),
        ];

        $startDate = Carbon::parse($procedure->session_debut);
        $endDate = Carbon::parse($procedure->session_fin);
        $checkSession = Carbon::now()->between($startDate, $endDate);

        if ($procedure->estperiodique && !$checkSession && $procedure->session_debut && $procedure->session_fin) {
            return view('livewire.sessionMsg', $data)
                ->extends("layouts.template")
                ->section("contenu");
        }

        return view('livewire.Demandes-p002.index', $data)
            ->extends("layouts.template")
            ->section("contenu");
    }

    protected   $rules = [
            'libelle_court' => 'required',
            'libelle_long' => 'required',


             /*'newDemande.user_id' => 'required',
            'newDemande.etat' => 'required',
             'addDemande.document2' => 'required',
            'addDemande.document3' => 'required',  */
        ];



    public function goToAddDemande(){
        $this->currentPage = PAGECREATEFORM;
    }

    public function goToListDemande(){
        $this->currentPage = PAGELIST;
        $this->editDemande = [];
    }

    public function goToEditDemande($id){
        $this->editDemande = Demande::find($id)->toArray();
        $this->currentPage = PAGEEDITFORM;

    }


    public function saveDemande() {


        $this->validate();

            $demande   = new Demande();
            $demande->nom  =  $this->nom;
            $demande->prenom=$this->prenom;
            $demande->cnib  = $this->cnib;
            $demande->adresse = $this->adresse;
            $demande->user_id            = Auth::user()->id;
            /* Desactivation du paiement*/
            $demande->save();
            session()->flash('message', 'Demande envoyée avec succès .');


        }








    public function store()
    {
        $validatedDate = $this->validate();
        $userId = Auth::user();



        if($this->document1 != null){
            $path = $this->document1->store('upload', 'public');
            $filePath1 = "storage/".$path;
        }
        if($this->document2 != null){
            $path = $this->document2->store('upload', 'public');
            $filePath2 = "storage/".$path;

        }



        $demande = Demande::create([
            //"user_id" => $userId,
            "nom" => $validatedDate["newDemande"]["nom"],
            "prenom" => $validatedDate["newDemande"]["prenom"],
            "cnib" => $validatedDate["newDemande"]["cnib"],
            "adresse" => $validatedDate["newDemande"]["adresse"],
            "document1" => $filePath1,
            "document2" => $filePath2,
            //$newDemande['etat'] = "nouveau"
        ]);

        session()->flash('message', 'Demande envoyée avec succes .');

        $this->newDemande = [];
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->newDemande = [];
    }

    public function edit($id){
        $this->editDemande = Demande::find($id)->toArray();
        $this->currentPage = PAGEEDITFORM;
    }

    public function download_PJ_1()
    {
        return response()->download(
            $this->editDemande["document1"], 'pieceJointe1.pdf'
        );
    }

    public function download_PJ_2()
    {
        return response()->download(
            $this->editDemande["document2"], 'pieceJointe2.pdf'
        );
    }


    protected function cleanupOldUploads(){

        $storage = Storage::disk("local");

        foreach($storage->allFiles("livewire-tmp") as $pathFileName){

            if(! $storage->exists($pathFileName)) continue;

            $fiveSecondeDelete = now()->subSeconds(5)->timestamp;

            if($fiveSecondeDelete > $storage->lastModified($pathFileName)){
                $storage->delete($pathFileName);
            }
        }
    }
}
