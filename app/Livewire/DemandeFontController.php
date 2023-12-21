<?php

namespace App\Livewire;

use App\Models\Commune;
use App\Models\Pays;
use App\Models\Demande;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Intervention\Image\Facades\Image;
use Symfony\Component\VarDumper\VarDumper;
use Illuminate\Http\Request;
use App\Models\DemandeP001;
use App\Models\DemandeP0010;
use App\Models\DemandeP0011;
use App\Models\DemandeP004;
use App\Models\DemandeP0012;
use App\Models\DemandeP003;
use App\Models\DemandeP006;
use App\Models\DemandeP007;
use App\Models\DemandeP008;
use App\Models\DemandeP002;
use App\Models\DemandeP005;
use App\Models\DemandePieceP001;
use App\Models\DemandePieceP0010;
use App\Models\DemandePieceP0011;
use App\Models\DemandePieceP0012;
use App\Models\DemandePieceP002;
use App\Models\DemandePieceP003;
use App\Models\DemandePieceP004;
use App\Models\DemandePieceP005;
use App\Models\DemandePieceP006;
use App\Models\DemandePieceP007;
use App\Models\DemandePieceP008;
use App\Models\DemandeCategorieP002;
use App\Models\DemandeDomaineP002;
use App\Models\DemandePiece;
use App\Models\DemandeSousDomaineP002;
use App\Models\Province;
use App\Models\TypeConstruction;
use App\Models\UsageConstruction;

class DemandeFontController extends Component
{

    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = "bootstrap";


    public $search;
    public $updateMode = false;
    public $currentPage = PAGECREATEFORM;

    public function render(Request $request)
    {

        $id = $request->id;
        $procedure = $request->procedure ;

        Carbon::setLocale("fr");
        $searchCriteria = "%".$this->search."%";

        $demande = null;
        $data = [];
        $view ='';
        $documents = null;
        $demande = Demande::where(['uuid' => $id])->first();
        $documents = DemandePiece::where(['demande_id' => $id])->get();
      
        $view ='livewire.Demandes.edit';
        $data = [
            "procedure" => $procedure,
            "demande" => Demande::where(['uuid' => $id])->first(),
            "demandes" => Demande::where("libelle_court", "like", $searchCriteria)->latest()->paginate(5),
            "name" => Auth::user()->usager->nom.' '.Auth::user()->usager->prenom,
            "email" => Auth::user()->email,
            "provinces" => Province::all(),
            "communes" => Commune::all(),
            "telephone" => Auth::user()->usager->telephone,
            "pays" => Pays::all(),
            "typeConstructions" => TypeConstruction::all(),
            "usages" => UsageConstruction::all(),

        ];

        return view($view, $data)
            ->extends("layouts.template")
            ->section("contenu");
    }

}
