<?php

namespace App\Http\Controllers;

use App\Mail\AffectDemandMailable;
use App\Mail\NoteEtudeMailable;
use App\Mail\RejectDemandMailable;
use App\Mail\RejectDemandMailableP001;
use App\Mail\ValidateDemandMailable;
use App\Mail\ValidateDemandMailableP001;
use App\Models\Agent;
use App\Models\Commentaire;
use App\Models\Demande;
use App\Models\Motif;
use App\Models\Procedure;
use App\Models\StatutDemande;
use App\Models\Usager;
use App\Models\User;
use App\Repositories\BackendRepository;
use App\Repositories\DemandeRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class BackendController extends Controller
{
    public $repository;

    public function __construct(BackendRepository $repository)
    {
        Carbon::setLocale('fr');
        $this->repository = $repository;
    }

    public function index(BackendRepository $backendRepository)
    {
        $data = [

            'nbAgrementTechnique' => Demande::all()->where('code', "P002")->count(),
            'nbAgrementTechniqueEnAttente' => Demande::all()->where('code', "P002")->where('etat', "D")->count(),
            'nbAgrementTechniqueValider' => Demande::all()->where('code', "P002")->where('etat', "V")->count(),
            'nbAgrementTechniqueRejette' => Demande::all()->where('code', "P002")->where('etat', "R")->count(),

            'nbAgrementTechniqueHomme' => Demande::all()->where('code', "P002")->where('sexe', "M")->count(),
            'nbAgrementTechniqueFemme' => Demande::all()->where('code', "P002")->where('sexe', "F")->count(),

            'nbEtudeSol' => Demande::all()->where('code', "P001")->count(),
            'nbEtudeSolEnAttente' => Demande::all()->where('code', "P001")->where('etat', "D")->count(),
            'nbEtudeSolValider' => Demande::all()->where('code', "P001")->where('etat', "V")->count(),
            'nbEtudeSolRejette' => Demande::all()->where('code', "P001")->where('etat', "R")->count(),

            // Demandes d'Agrement par categorie
            'demande' => Demande::all(),
            'countTH' => Demande::join('categorie_demandes', 'demandes.categorie_id', '=', 'categorie_demandes.uuid')->where('categorie_demandes.code', 'TH')->count(),
            'countTR1' => Demande::join('categorie_demandes', 'demandes.categorie_id', '=', 'categorie_demandes.uuid')->where('categorie_demandes.code', 'TR1')->count(),
            'countTR2' => Demande::join('categorie_demandes', 'demandes.categorie_id', '=', 'categorie_demandes.uuid')->where('categorie_demandes.code', 'TR2')->count(),
            'countTR3' => Demande::join('categorie_demandes', 'demandes.categorie_id', '=', 'categorie_demandes.uuid')->where('categorie_demandes.code', 'TR3')->count(),
            'countEC' => Demande::join('categorie_demandes', 'demandes.categorie_id', '=', 'categorie_demandes.uuid')->where('categorie_demandes.code', 'EC')->count(),
        ];

        return view('backend.home', $data);
    }

    public function procedureDashboard($procedure, $procedureName)
    {
        $data = [

            //  "demandes" => $demandeP001Repository->all(),
            'procedure' => $this->repository->uuidProcedureByDemande($procedure, ['estperiodique' => '1']),
            'procedureName' => $procedureName,
            'demandeDeposee' => $this->repository->nombreDemandeByProcedure($procedure, ['etat' => 'D']),
            'demandeValider' => $this->repository->nombreDemandeByProcedure($procedure, ['etat' => 'V']),
            'demandeSigne' => $this->repository->nombreDemandeByProcedure($procedure, ['etat' => 'S']),
            'demandeRejeter' => $this->repository->nombreDemandeByProcedure($procedure, ['etat' => 'R']),
            'demandeArchive' => $this->repository->nombreDemandeByProcedure($procedure, ['etat' => 'A']),
            'demandeComplement' => $this->repository->nombreDemandeByProcedure($procedure, ['etat' => 'C']),
            'demandeEtude' => $this->repository->nombreDemandeByProcedure($procedure, ['etat' => 'E']),

        ];

        return view('backend.home_detail', $data);
    }

    // Recuperation de la list des demande concernant p001 Produi chimique
    public function listDemande(DemandeRepository $demandeRepository, Demande $demandeTest)
    {
        //dd(DB::table('demande_P001_s')->join('demandes', 'demande_P001_s.demande_id', '=', 'demandes.uuid')->orderBy('demande_P001_s.created_at')->get());
        $data = [
            'demandes' => $demandeRepository->all()->sortByDesc('created_at'),
            'statutDepose' => StatutDemande::where('etat', '=', 'D')->first()->statut,
            'statutArchive' => StatutDemande::where('etat', '=', 'A')->first()->statut,
            'statutRejete' => StatutDemande::where('etat', '=', 'R')->first()->statut,
            'statutEtude' => StatutDemande::where('etat', '=', 'E')->first()->statut,
            'statutComplement' => StatutDemande::where('etat', '=', 'C')->first()->statut,
            'statutSigne' => StatutDemande::where('etat', '=', 'S')->first()->statut,
            'statutValide' => StatutDemande::where('etat', '=', 'V')->first()->statut,
            //   "demandes"=>$demandeTest::where(['demande_p001_id',' =>', $demandeTest->demandePiece])->get(),
            'demandeEnCours' => $demandeRepository->nombre('demandes', ['etat' => 'en cours']),
            'demandeEtat' => $demandeTest->statut(),
            'agents' => Agent::all(),
            'motifsP001' => Motif::where("code", "=", "P001")->sortByAsc('ordre'),
            'motifsP002' => Motif::where("code", "=", "P002"),
            'motifs' => Motif::all(),
        ];

        //  dd($data['demandes'][0]->demandePiece);

        return view('backend.list_demande', $data);
    }

    // fonction d'assignation d'un collaborateur a un dossier
    public function assignation($model, $idDemande, $nameDemandeId, $tableName, Request $request)
    {
        //Creer une affection
        $data = $request->all();

        $modele = app("App\Models\\$model");
        // $affectation = new $table();
        $modele::create([
            $nameDemandeId => $idDemande,
            'agent_id' => $data['agent_id'],
            'commentaire' => $data['commentaire'],
        ]);

        DB::table($tableName)->where('uuid', $idDemande)->update(['last_agent_assign' => $data['agent_id']]);
        DB::table($tableName)->where('uuid', $idDemande)->update(['commentaire' => $data['commentaire']]);

        $proc_id = DB::table($tableName)->where('uuid', $idDemande)->first()->procedure_id;
        $currentStatus = DB::table($tableName)->where('uuid', $idDemande)->first()->etat;
        $agent_email = User::where('agent_id', $data['agent_id'])->first()->email;
        $demand = [
            'procedure' => Procedure::where('uuid', $proc_id)->first()->libelle_long,
            'reference' => DB::table($tableName)->where('uuid', $idDemande)->first()->reference,
            'etat' => StatutDemande::where('etat', $currentStatus)->first()->statut,
            'commentaire' => $data['commentaire'],
        ];
        Mail::to($agent_email)->send(new AffectDemandMailable($demand));

        Alert::success('Succès', 'demande assignée !');

        return redirect()->back();
    }

    //Function de mise a jour de statut demande

    public function statutChange($id, $currentStatus, Request $request)
    {

        $nextStatus = '';
        switch ($currentStatus) {
            case 'D':
                $nextStatus = 'V';
                break;
            case 'V':
                $nextStatus = 'A';
                 break;
            /* case 'S':
                $nextStatus = 'A';
                break; */
            default:
                $nextStatus = 'A';
                break;
        }
       // dd($currentStatus);
       
       
        Demande::where('uuid', $id)->update(['etat' => $nextStatus]);
        
        $proc_id = Demande::where('uuid', $id)->first()->procedure_id;
        $usager_id = Demande::where('uuid', $id)->first()->usager_id;
        $usager = Usager::where('uuid', $usager_id)->first();
        $user_email = User::where('usager_id', $usager_id)->first()->email;
        $demande = Demande::find($id);
        $code = $demande->procedure->code;

        if ($code == 'P001') {

            $demand = [
                'procedure' => Procedure::where('uuid', $proc_id)->first()->libelle_long,
                'reference' => Demande::where('uuid', $id)->first()->reference,
                //'etat' => StatutDemande::where('etat', $nextStatus)->first()->statut,
                'name' => $usager->nom . ' ' . $usager->prenom,
            ];
            try {
                Mail::to($user_email)->send(new ValidateDemandMailableP001($demand));
            } catch (\Exception $e) {
               // dd($e);
            }
        } elseif ($code == 'P002') {

            $demand = [
                'procedure' => Procedure::where('uuid', $proc_id)->first()->libelle_long,
                'reference' => Demande::where('uuid', $id)->first()->reference,
                'etat' => StatutDemande::where('etat', $nextStatus)->first()->statut,
                "name" => $usager->nom . ' ' . $usager->prenom,
                'categorie' => $demande->categorie->libelle,
                'nomEntreprise' => $demande->raison_social,
            ];
            try {
                Mail::to($user_email)->send(new ValidateDemandMailable($demand));
            } catch (\Exception $e) {
                
            }
        }

        return redirect()->back()->with('success', 'Opération éffectuée avec succès !');
    }

    
    public function rejetter($id, Request $request)
    {
        Demande::where('uuid', $id)->update(['etat' => 'R']);

        $demande = Demande::where('uuid', $id)->first();
        $motifdd = $demande->motif()->first();
        $motifIDS = $request->libelle;
        foreach ($motifIDS as $motifid) {
            $demande->motif()->attach($motifid, ["commentaire" => $request->autre]);
            $proc_id = Demande::where('uuid', $id)->first()->procedure_id;
            $usager_id = Demande::where('uuid', $id)->first()->usager_id;
            $user_email = User::where('usager_id', $usager_id)->first()->email;
            $currentStatus = Demande::where('uuid', $id)->first()->etat;
            $usager = Usager::where('uuid', $usager_id)->first();
            $demande = Demande::find($id);
            $code = $demande->procedure->code;

            $libelles = array();
            foreach ($motifIDS as $motifid) {

                $libelle = Motif::where('uuid', $motifid)->first()->libelle;
                array_push($libelles, $libelle);
            }
            if ($request->autre != null) {
                array_push($libelles, $request->autre);
            }

            if ($code == 'P001') {
                $demand = [
                    'procedure' => Procedure::where('uuid', $proc_id)->first()->libelle_long,
                    'reference' => Demande::where('uuid', $id)->first()->reference,
                    'etat' => StatutDemande::where('etat', $currentStatus)->first()->statut,
                    //'motif' => $request->libelle,
                    'motif' => $libelles, // Motif::where('uuid', $request->libelle)->libelle,
                    "name" => $usager->nom . ' ' . $usager->prenom,
                ];
                try {
                    Mail::to($user_email)->send(new RejectDemandMailableP001($demand));
                } catch (\Exception $e) {
                    
                }
            } elseif ($code == 'P002') {
                $demand = [
                    'procedure' => Procedure::where('uuid', $proc_id)->first()->libelle_long,
                    'reference' => Demande::where('uuid', $id)->first()->reference,
                    'etat' => StatutDemande::where('etat', $currentStatus)->first()->statut,
                    'motif' => $libelles,
                    "categorie" => $demande->categorie->libelle,
                    "nomEntreprise" => $demande->raison_social,
                    "name" => $usager->nom . ' ' . $usager->prenom,
                ];
                try {
                    Mail::to($user_email)->send(new RejectDemandMailable($demand));
                } catch (\Exception $e) {
                }
            }

            return redirect()->back()->with('success', 'La Demande a été Rejetter avec succès !');
        }
    }

    public function nombreDemandeByProcedure()
    {

        // print json_encode(array(
        //     'status' => 'success',
        //     "nbProchimique" => $demandeRepository->nombre('demande_p001_s', array('etat' => 'D')),
        //     "nbAgrementTechique" => $demandRepository->nombre('demande_p002_s', array('etat' => 'D')),
        // ));
    }

    public function listsDemande(DemandeRepository $demandeRepository,Request $request) {

        //dd($demandes);
        $demandes = null;
        $data = [];
        $demandes = Demande::where(['usager_id' => Auth::user()->usager->uuid])->get();
        //dd($demandes);
        $data = [
            'demandes' => $demandes,
            'procedures' => Procedure::all(),
            'selectedProcedure' => $request->procedure,
        ];

        return view('backend.lists_demandesAgents', $data);
    }

    //profile user-metiers

    public function show()
    {
        return view('backend.users-profile', ['user' => auth()->user()]);
    }

    public function edit()
    {
        return view('profile.edit', ['user' => auth()->user()]);
    }

    public function update(Request $request)
    {
        $userData = ['name' => $request->name, 'email' => $request->email];
        $agentData = [
            'matricule' => $request->date_naissance,
            'date_affectation' => $request->date_affectation,
            'date_prise_service' => $request->date_prise_service,
            'date_naissance' => $request->date_naissance,
            'telephone' => $request->telephone,
        ];
        //  dd($agentData['date_affectation']);

        DB::table('users')->where('uuid', Auth::user()->uuid)->update($userData);
        DB::table('agents')->where('uuid', $request->uuid)->update($agentData);

        return redirect()->route('users-profile')->with('success', 'Profile Mis à jour avec succès !');
    }

    public function listDemandeAll(DemandeRepository $demandeRepository, Demande $demandeTest, $procedure="Toutes")
    {
        if($procedure == "D"){
            $demandes = Demande::all()->where("etat", "D");;

        }else if($procedure == "V"){
            $demandes = Demande::all()->where("etat", "V");

        }else if($procedure == "R"){
            $demandes = Demande::all()->where("etat", "R");

        }else if($procedure == "Toutes"){
            $demandes = Demande::all();
        }

        $data = [
            'demandes' => $demandes, //DB::table('demande_P001_s')->join('demandes', 'demande_P001_s.demande_id', '=', 'demandes.uuid')->get(),
            'selectedProcedure' => $procedure,
            'statutDevisEnvoye' => StatutDemande::where('etat', '=', 'N')->first()->statut,
            'statutDepose' => StatutDemande::where('etat', '=', 'D')->first()->statut,
            'statutArchive' => StatutDemande::where('etat', '=', 'A')->first()->statut,
            'statutRejete' => StatutDemande::where('etat', '=', 'R')->first()->statut,
            'statutEtude' => StatutDemande::where('etat', '=', 'E')->first()->statut,
            'statutComplement' => StatutDemande::where('etat', '=', 'C')->first()->statut,
            'statutSigne' => StatutDemande::where('etat', '=', 'S')->first()->statut,
            'statutValide' => StatutDemande::where('etat', '=', 'V')->first()->statut,
            //   "demandes"=>$demandeTest::where(['demande_p001_id',' =>', $demandeTest->demandePiece])->get(),
            'demandeEnCours' => $demandeRepository->nombre('demandes', ['etat' => 'en cours']),
            'demandeEtat' => $demandeTest->statut(),
            'agents' => Agent::all(),

            "motifP001" => Motif::where("code_procedure", "=", "P001")->orderBy("ordre"),
            "motifP002" => Motif::where("code_procedure", "=", "P002")->orderBy("ordre"),
            "motifs" => Motif::all()
        ];

        //   dd($data['demandes'][0]->demandePiece);

        return view('backend.list_demande', $data);
    }


    public function noteEtude($id, $currentStatus, Request $request)
    {
        Storage::makeDirectory('public/Notes_Etudes');
        $demande = Demande::find($id);
        $note = $request->file('note_etude_file')->store('public/Notes_Etudes');
        $demande->note_etude_file = $note;
        $demande->save();

        $proc_id = Demande::where('uuid', $id)->first()->procedure_id;
        $usager_id = Demande::where('uuid', $id)->first()->usager_id;
        $usager = Usager::where('uuid', $usager_id)->first();
        $user_email = User::where('usager_id', $usager_id)->first()->email;
        $demand = [
            'procedure' => Procedure::where('uuid', $proc_id)->first()->libelle_long,
            'reference' => Demande::where('uuid', $id)->first()->reference,
            "name" => $usager->nom . ' ' . $usager->prenom,
            "date" => $demande->created_at,
            "note" => $note,
        ];
        try {
            Mail::to($user_email)->send(new NoteEtudeMailable($demand));
        } catch (Exception $e) {
            
        }

        return redirect()->back()->with('success', 'Note d\'étude envoyée avec succes avec succès !');
    }
}
