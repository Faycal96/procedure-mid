<?php

namespace App\Http\Controllers;

use App\Mail\AffectDemandMailable;
use App\Mail\RejectDemandMailable;
use App\Mail\ValidateDemandMailable;
use App\Models\Agent;
use App\Models\Commentaire;
use App\Models\Demande;
use App\Models\Procedure;
use App\Models\StatutDemande;
use App\Models\User;
use App\Repositories\BackendRepository;
use App\Repositories\DemandeRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

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

        // dd(Auth::user()->role->libelle);
        $data = [
            'nbAgrementTechnique' => $backendRepository->nombreDemandeByProcedure('demande_p001_s', ['etat' => 'D']),
            'nbEtudeSol' => $backendRepository->nombreDemandeByProcedure('demande_p002_s', ['etat' => 'D']),
        ];

        return view('backend.home', $data);
    }

    public function procedureDashboard($procedure, $procedureName)
    {
        // dd($this->repository->uuidProcedureByDemande($procedure));

        // Procedure::where('etat', '=', 'D')->first()->statut;
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
        ];

        //   dd($data['demandes'][0]->demandePiece);

        return view('backend.list_demande', $data);
    }

    // Liste des demandes p002 agrement en eau
    // public function listDemandep002(DemandeRepository $demandeP002Repository, DemandeP002 $demandep002)
    // {

    //     $data = [
    //         "demandes" => $demandeP002Repository->all()->sortByDesc('created_at'),
    //         "statutDepose" => StatutDemande::where('etat', '=', 'D')->first()->statut,
    //         "statutArchive" => StatutDemande::where('etat', '=', 'A')->first()->statut,
    //         "statutRejete" => StatutDemande::where('etat', '=', 'R')->first()->statut,
    //         "statutEtude" => StatutDemande::where('etat', '=', 'E')->first()->statut,
    //         "statutComplement" => StatutDemande::where('etat', '=', 'C')->first()->statut,
    //         "statutSigne" => StatutDemande::where('etat', '=', 'S')->first()->statut,
    //         "statutValide" => StatutDemande::where('etat', '=', 'V')->first()->statut,
    //         //   "demandes"=>$demandeTest::where(['demande_p001_id',' =>', $demandeTest->demandePiece])->get(),
    //         "demandeEnCours" => $demandeP002Repository->nombre('demande_p002_s', array('etat' => 'en cours')),
    //         "demandeEtat" => $demandep002->statut(),
    //         "agents" => Agent::all(),
    //     ];
    //     //   dd($data['demandes'][0]->demandePiece);
    //     // dd($data['demandeEtat']);

    //     return view('backend.list_demandep002', $data);
    // }

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

    public function statutChange($id, $currentStatus, $table, Request $request)
    {

        $nextStatus = '';
        switch ($currentStatus) {
            case 'D':
                $nextStatus = 'E';
                break;
            case 'E':
                $nextStatus = 'V';
                break;
            case 'V':
                //     $nextStatus = 'S';
                //     break;
                // case 'S':
                $nextStatus = 'A';
                break;
            default:
                $nextStatus = 'A';
                break;
        }
        Demande::where('uuid', $id)->update(['etat' => $nextStatus]);

        if ($table == 'demande_p001_s') {

            $dataFiles = $request->all();
            //$noteEtude = $this->repository->uploadNoteEtude($table, $dataFiles, 'note_etude_file', $id);

            $commentaire1 = new Commentaire();
            $commentaire1->create([
                'libelle' => $request->libelle,
                'demande_id' => $id,
            ]);
        // return redirect()->back()->with('success', "opération effectuée avec succès !");

        } elseif ($table == 'demande_p002_s') {

            $dataFiles = $request->all();
            //$noteEtude = $this->repository->uploadNoteEtude($table, $dataFiles, 'note_etude_file', $id);

            $commentaire2 = new Commentaire();
            $commentaire2->create([
                'libelle' => $request->libelle,
                'demande_id' => $id,
            ]);
        }

        // DB::table('commentaire_p001_s')->insert();

        $proc_id = Demande::where('uuid', $id)->first()->procedure_id;
        $usager_id = Demande::where('uuid', $id)->first()->usager_id;
        $user_email = User::where('usager_id', $usager_id)->first()->email;
        $demand = [
            'procedure' => Procedure::where('uuid', $proc_id)->first()->libelle_long,
            'reference' => Demande::where('uuid', $id)->first()->reference,
            'etat' => StatutDemande::where('etat', $nextStatus)->first()->statut,
        ];

        // try {
        //     Mail::to($user_email)->send(new ValidateDemandMailable($demand));

        // } catch (Throwable $e) {
        //     report($e);
        // }

        return redirect()->back()->with('success', 'Opération éffectuée avec succès !');
    }

    // fonction de chargement de acte

    public function uploadActe($id, $currentStatus, Request $request)
    {
        $dataFiles = $request->all();
        if ($currentStatus == 'S') {

            $acteSigne = $this->repository->uploadActe($table, $dataFiles, 'output_file', $id);

            return redirect()->back()->with('success', "L'acte a été Joint avec succès !");
        } else {
            return redirect()->back()->with('success', 'Operation echouée !');
        }
    }

    public function rejetter($id, Request $request)
    {
        Demande::where('uuid', $id)->update(['etat' => 'R']);

        $commentaire = new Commentaire();
        $commentaire->create([
            'libelle' => $request->libelle,
            'demande_id' => $id,
        ]);
        $proc_id = Demande::where('uuid', $id)->first()->procedure_id;
        $usager_id = Demande::where('uuid', $id)->first()->usager_id;
        $user_email = User::where('usager_id', $usager_id)->first()->email;
        $currentStatus = Demande::where('uuid', $id)->first()->etat;
        $demand = [
            'procedure' => Procedure::where('uuid', $proc_id)->first()->libelle_long,
            'reference' => Demande::where('uuid', $id)->first()->reference,
            'etat' => StatutDemande::where('etat', $currentStatus)->first()->statut,
            'motif' => $request->libelle,
        ];
        Mail::to($user_email)->send(new RejectDemandMailable($demand));

        return redirect()->back()->with('success', 'La Demande a été Rejetter avec succès !');
    }

    public function nombreDemandeByProcedure()
    {

        // print json_encode(array(
        //     'status' => 'success',
        //     "nbProchimique" => $demandeRepository->nombre('demande_p001_s', array('etat' => 'D')),
        //     "nbAgrementTechique" => $demandRepository->nombre('demande_p002_s', array('etat' => 'D')),
        // ));
    }

    public function listsDemande(
        DemandeRepository $demandeRepository, Request $request)
    {

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

    public function listDemandeAll(DemandeRepository $demandeRepository, Demande $demandeTest)
    {
        // dd(Demande::all()[0]);
        //dd(DB::table('demande_P001_s')->join('demandes', 'demande_P001_s.demande_id', '=', 'demandes.uuid')->orderBy('demande_P001_s.created_at')->get());
        $data = [
            'demandes' => Demande::all(), //DB::table('demande_P001_s')->join('demandes', 'demande_P001_s.demande_id', '=', 'demandes.uuid')->get(),
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
        ];

        //   dd($data['demandes'][0]->demandePiece);

        return view('backend.list_demande', $data);
    }

}
