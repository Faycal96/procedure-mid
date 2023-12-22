<?php

namespace App\Http\Controllers;

use App\Models\DemandeP002;
use App\Models\DemandePiece;
use App\Models\Procedure;
use App\Repositories\DemandeP002Repository;
use Illuminate\Http\Request;
use App\Repositories\DemandeRepository;
use App\Repositories\DemandePieceRepository;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\StoreDemandeP002Request;

class DemandeP002Controller extends Controller
{
    public $repository;
    public $demandeRepositoryP002;
    public function __construct(DemandeRepository $repository, DemandeP002Repository $demandeRepositoryP002)
    {
        $this->repository = $repository;
        $this->demandeRepositoryP002 = $demandeRepositoryP002;
        
    }


    public function index()
    {
        return view('create');
    }

    public function create()
    {

        // $data["commune"] = Commune::all();
        // dd($data["commune"]);
        return view('livewire.Demandes.create');
    }

    public function payment($numero, $otp)
    {
        if ($numero && $otp) {
            return true;
        } else {
            return false;
        }
        //return view('livewire.Demandesp0022.create');
    }

    public function store(Request $request, UserRepository $userRepository, DemandePieceRepository $demandePieceRepository, DemandeP002 $demande)
    {


        $data =  $request->all();

//    if ($this->payment($data["numero"], $data["otp"])) {
            $dataFiles = $request->all();

            $data['usager_id'] = Auth::user()->usager_id;
            $data['etat'] = 'D'; //code de procedure demande deposee
            // generation de code reference pour chaque demande
            $data['reference'] = $this->repository->generateReference('P002');
            $data['delai'] = Procedure::where(['code' => 'P002'])->first('delai')->delai;
            $data['paiement']= 1;
            $data['reference'] = $this->repository->generateReference('P002');
            
            $data['procedure_id'] = Procedure::where(['code' => 'P002'])->first('uuid')->uuid;
                    
            //dd($data);
            $demande = $this->demandeRepositoryP002->create($data);  
          
            //dd($data);
            //$demande->save();
            

            //return redirect('/')->with('success', 'Votre Demande à bien été Soumise et en cours de traitement !!');
            return redirect('/demandes-lists')->with('success', 'Votre Demande à bien été Soumise et en cours de traitement !!');
        //} else {
        //}
    }




    // partie update

    public function update(Request $request, UserRepository $userRepository, DemandePieceRepository $demandePieceP002Repository, DemandeP002 $demande)
    {

        $data =  $request->all();

            $dataFiles = $request->all();


        $data['updated_at'] = Carbon::parse(Carbon::now())->format('Ymd');

            $data['etat'] = 'D'; //code de procedure demande deposee
            // generation de code reference pour chaque demande
            $data['delai'] = Procedure::where(['code' => 'P002'])->first('delai')->delai;

            unset($data['avis_faisabilite']);
            unset($data['rccm']);
            unset($data['facture_pro_format']);
            unset($data['fiche_securite']);
            unset($data['registre_tracabilite']);
            unset($data['registre_dechet']);
            unset($data['attestation_destination_finale']);
            unset($data['list_produit']);

            unset($data['telephone']);
            unset($data['next']);
            unset($data['current_faisabilite']);
            unset($data['current_rccm']);
            unset($data['current_facture_pro_format']);
            unset($data['current_fiche_securite']);
            unset($data['current_registre_tracabilite']);
            unset($data['current_registre_dechet']);
            unset($data['current_attestation_destination_finale']);
            unset($data['current_list_produit']);

            $this->repository->updateById($request->uuid, $data);
            $demande = $this->repository->getById($request->uuid);

             //Recuperation du chemin des fichiers joint
             if ($request->file('avis_faisabilite')) {
                $cheminFaisabilite =  $this->repository->uploadFile($dataFiles, 'avis_faisabilite ');
                $demandePieceP002Repository->setChemin($cheminFaisabilite, $demande->uuid, 'Avis Faisabilite');
                DB::table('demande_piece_p002_s')->where('chemin',  $request->current_faisabilite)->delete();
                @unlink($request->current_faisabilite);
            }

            if ($request->file('rccm')) {
                $cheminRccm =  $this->repository->uploadFile($dataFiles, 'rccm');
                $demandePieceP002Repository->setChemin($cheminRccm, $demande->uuid, 'Rccm');
                DB::table('demande_piece_p002_s')->where('chemin',  $request->current_rccm)->delete();
                @unlink($request->current_rccm);
            }

            if ($request->file('facture_pro_format')) {
                $facture_pro_format =  $this->repository->uploadFile($dataFiles, 'facture_pro_format');
                $demandePieceP002Repository->setChemin($facture_pro_format, $demande->uuid, 'Facture Pro-Format');
                DB::table('demande_piece_p002_s')->where('chemin',  $request->current_facture_pro_format)->delete();
                @unlink($request->current_facture_pro_format);
            }

            if ($request->file('fiche_securite')) {
                $cheminFicheSecurite =  $this->repository->uploadFile($dataFiles, 'fiche_securite');
                $demandePieceP002Repository->setChemin($cheminFicheSecurite, $demande->uuid, 'Fiche Securite');
                DB::table('demande_piece_p002_s')->where('chemin',  $request->current_fiche_securite)->delete();
                @unlink($request->current_fiche_securite);
            }

            if ($request->file('registre_tracabilite')) {
                $registre_tracabilite =  $this->repository->uploadFile($dataFiles, 'registre_tracabilite');
                $demandePieceP002Repository->setChemin($registre_tracabilite, $demande->uuid, 'Registre de Tracabilite');
                DB::table('demande_piece_p002_s')->where('chemin',  $request->current_registre_tracabilite)->delete();
                @unlink($request->current_registre_tracabilite);
            }

            if ($request->file('registre_dechet')) {
                $registre_dechet =  $this->repository->uploadFile($dataFiles, 'registre_dechet');
                $demandePieceP002Repository->setChemin($registre_dechet, $demande->uuid, 'Registre Dechet');
                DB::table('demande_piece_p002_s')->where('chemin',  $request->current_registre_dechet)->delete();
                @unlink($request->current_registre_dechet);
            }

            if ($request->file('attestation_destination_finale')) {
                $attestation_destination_finale =  $this->repository->uploadFile($dataFiles, 'attestation_destination_finale');
                $demandePieceP002Repository->setChemin($attestation_destination_finale, $demande->uuid, 'Attestation destination Finale');
                DB::table('demande_piece_p002_s')->where('chemin',  $request->current_attestation_destination_finale)->delete();
                @unlink($request->current_attestation_destination_finale);
            }

            if ($request->file('list_produit')) {

            $list_produit =  $this->repository->uploadFile($dataFiles, 'list_produit');
            $demandePieceP002Repository->setChemin($list_produit, $demande->uuid, 'Liste des poduits');
                DB::table('demande_piece_p002_s')->where('chemin',  $request->current_list_produit)->delete();
                @unlink($request->current_list_produit);
            }

            return redirect('/demandes-lists?procedure=DATIPC')->with('success', 'Votre Demande à bien été Modifiée et en cours de traitement !!');

    }
}
