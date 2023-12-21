<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\DemandeP002;
use App\Models\Procedure;
use Illuminate\Http\Request;
use App\Repositories\DemandePieceP002Repository;
use Illuminate\Support\Facades\Auth;
use App\Repositories\DemandeP002Repository;
use Carbon\Carbon;
use App\Http\Requests\StoreDemandeP002Request;
use Illuminate\Support\Facades\DB;
use App\Models\DemandeCategorieP002;
use App\Models\DemandeDomaineP002;
use App\Models\CategorieDemande;
class DemandeP002Controller extends Controller {

    public $repository;

    public function __construct(DemandeP002Repository $repository) {
        $this->repository = $repository;
    }



    public function store(StoreDemandeP002Request $request, DemandePieceP002Repository $demandePieceP002Repository, /*DemandeP002*/ Demande $demande) {

       
        //dd($demande);

        $dataDemande = [
            'date_demande' => Carbon::parse(Carbon::now())->format('Ymd'),
            'etat' => 'D',
            'libelle_court' => "DSAT", 
            'identite' => $request->identite,
            'commune_id' => $request->commune_id, //$request->commune_id,
            'beneficiaire' => "Ali", //$request->beneficiaire,
            'procedure_id' => Procedure::where(['code' => 'P002'])->first('uuid')->uuid,
            'reference' => $this->repository->generateReference('P002'),
            'delai' => Procedure::where(['code' => 'P002'])->first('delai')->delai,
            'montant' => 1,
            'date_certif' => Carbon::parse(Carbon::now())->format('Ymd'),
            'usager_id' => Auth::user()->usager_id,
            'last_modified_by' => Auth::user()->usager_id,
            'is_certified' => true,
            
             // infos sur le type de demande
            'objectif_demande' => $request->objectif_demande,
            'categorie_id' =>  $request->categorie, //CategorieDemande::where(['code' => $request->categorie ])->first('uuid')->uuid,

            // infos sur l'entreprise
            'beneficiaire' =>  $request->beneficiaire, 
            'raison_social' =>  $request->raison_social, 
            'siege_social' =>  $request->siege_social, 
            'boite_postale' =>  $request->boite_postale, 
            'fax' =>  $request->fax, 
            'tel_1' =>  $request->tel_1, 
            'email_entreprise' =>  $request->email_entreprise, 
            'adresse_physique' =>  $request->adresse_physique, 

            // infos sur le representant de l'entrepise
            'nom_representant' =>  $request->nom_representant, 
            'prenom_representant' =>  $request->prenom_representant, 
            'fonction_representant' =>  $request->fonction_representant, 
            'adresse_representant' =>  $request->adresse_representant, 
            //'no_employeur_CNSS)' =>  $request->no_employeur_CNSS, // champs non dispo dans la table
        ];
            


        //dd($dataDemande);
            /*
            if($request->sous_domaine && sizeof($request->sous_domaine)>0){
                if(strlen($request->sous_domaine[0]> 0)){
                    $sousdomaine = implode(", ", $request->sous_domaine);
                    $dataDemande['sous_domaine'] =$sousdomaine;
                }
            }
            */
        // Sauvegarde de la demande

        $demande = $this->repository->create($dataDemande);
        $demande->save();


        /*
        //Recuperation du chemin des fichiers joint
            $cheminRecuAchat = $this->repository->uploadFile($request->file('recu_achat_dossier'));
            $cheminifu = $this->repository->uploadFile($request->file('ifu'));
            $cheminRccm = $this->repository->uploadFile($request->file('rccm'));
            $cheminCnss = $this->repository->uploadFile($request->file('cnss'));
            $cheminFicheRenseignement = $this->repository->uploadFile($request->file('fiche_renseignement'));
            $cheminDeclarationHonneur = $this->repository->uploadFile($request->file('declaration_honneur'));

            //Enregistement des fchiers joints
            $demandePieceP002Repository->setChemin($cheminRecuAchat, $demande->uuid, 'Récu achat dossier');
            $demandePieceP002Repository->setChemin($cheminifu, $demande->uuid, 'Certificat Ifu');
            $demandePieceP002Repository->setChemin($cheminRccm, $demande->uuid, 'Rccm');
            $demandePieceP002Repository->setChemin($cheminCnss, $demande->uuid, 'Attestation employeur CNSS');
            $demandePieceP002Repository->setChemin($cheminFicheRenseignement, $demande->uuid, 'Fiche Renseignement');
            $demandePieceP002Repository->setChemin($cheminDeclarationHonneur, $demande->uuid, 'Déclaration sur l’honneur de l’exactitude des informations');

            //Enregistrement des documents liste u personnel
            if ($request->libelle_document && sizeof($request->libelle_document) > 0) {
                $n = sizeof($request->libelle_document);
                for ($i = 0; $i < $n; $i++) {
                    $chemin = $this->repository->uploadFile($request->file('fichier_document')[$i]);
                    $demandePieceP002Repository->setChemin($chemin, $demande->uuid, $request->libelle_document[$i]);
                }
            }
            //Enregistrement des documents pour le matériel roulant
            if ($request->libelle_document_roulant && sizeof($request->libelle_document_roulant) > 0) {
                $n = sizeof($request->libelle_document_roulant);
                for ($i = 0; $i < $n; $i++) {
                    $chemin = $this->repository->uploadFile($request->file('fichier_document_roulant')[$i]);
                    $demandePieceP002Repository->setChemin($chemin, $demande->uuid, $request->libelle_document_roulant[$i]);
                }
            }
              //Enregistrement des documents pour le matériel non roulant
            if ($request->libelle_document_non_roulant && sizeof($request->libelle_document_non_roulant) > 0) {
                $n = sizeof($request->libelle_document_non_roulant);
                for ($i = 0; $i < $n; $i++) {
                    $chemin = $this->repository->uploadFile($request->file('fichier_document_non_roulant')[$i]);
                    $demandePieceP002Repository->setChemin($chemin, $demande->uuid, $request->libelle_document_non_roulant[$i]);
                }
            }
          // return json_encode(array('status' => 'success'));
        */
        return redirect('/')->with('success', 'Votre Demande à bien été Soumise et en cours de traitement !!');
        //return json_encode(array('status' => 'fail'));
    }
    








    public function update(Request $request,
            DemandePieceP002Repository $demandePieceP002Repository,
            DemandeP002 $demande) {
            
            $dataDemande = ['etat' => 'D',
                    'updated_at' => Carbon::parse(Carbon::now())->format('Ymd'),
                    'identite' => $request->identite,
                    'commune_id' => $request->commune_id,
                    'beneficiaire' => $request->beneficiaire,
                    'date_certif' => Carbon::parse(Carbon::now())->format('Ymd'),
                    'last_modified_by' => Auth::user()->usager_id,
                    'updated_by' => Auth::user()->usager_id,
                    'is_certified' => true,
                    'domaine' => DemandeDomaineP002::where(['uuid' => $request->domaine])->first('libelle_long')->libelle_long,
                    'categorie' => DemandeCategorieP002::where(['uuid' => $request->categorie])->first('libelle_long')->libelle_long,
                    ];
            if($request->sous_domaine && sizeof($request->sous_domaine)>0){
                if(strlen($request->sous_domaine[0]> 0)){
                    $sousdomaine = implode(", ", $request->sous_domaine);
                    $dataDemande['sous_domaine'] =$sousdomaine;
                }
            }
        // Sauvegarde de la demande

        $this->repository->updateById($request->uuid, $dataDemande);
        $demande = $this->repository->getById($request->uuid);
        
              //Recuperation du chemin des fichiers joint
            if ($request->file('recu_achat_dossier')) {
                $cheminRecuAchat = $this->repository->uploadFile($request->file('recu_achat_dossier'));
                $demandePieceP002Repository->setChemin($cheminRecuAchat, $demande->uuid, 'Récu achat dossier');
                DB::table('demande_piece_p002_s')->where('chemin',  $request->current_recu)->delete();
                @unlink($request->current_recu);
            }
            if ($request->file('ifu')) {
                 $cheminifu = $this->repository->uploadFile($request->file('ifu'));
                 $demandePieceP002Repository->setChemin($cheminifu, $demande->uuid, 'Certificat Ifu');
                 DB::table('demande_piece_p002_s')->where('chemin',  $request->current_ifu)->delete();
                 @unlink($request->current_ifu);
            }
            if ($request->file('rccm')) {
                 $cheminRccm = $this->repository->uploadFile($request->file('rccm'));
                 $demandePieceP002Repository->setChemin($cheminRccm, $demande->uuid, 'Rccm');
                 DB::table('demande_piece_p002_s')->where('chemin',  $request->current_rccm)->delete();
                 @unlink($request->current_rccm);
            }
            if ($request->file('cnss')) {
                 $cheminCnss = $this->repository->uploadFile($request->file('cnss'));
                 $demandePieceP002Repository->setChemin($cheminCnss, $demande->uuid, 'Attestation employeur CNSS');
                 DB::table('demande_piece_p002_s')->where('chemin',  $request->current_cnss)->delete();
                 @unlink($request->current_cnss);
            }
            if ($request->file('fiche_renseignement')) {
                $cheminFicheRenseignement = $this->repository->uploadFile($request->file('fiche_renseignement'));
                $demandePieceP002Repository->setChemin($cheminFicheRenseignement, $demande->uuid, 'Fiche Renseignement');
                DB::table('demande_piece_p002_s')->where('chemin',  $request->current_rens)->delete();
                @unlink($request->current_rens);
            }
            if ($request->file('declaration_honneur')) {
                $cheminDeclarationHonneur = $this->repository->uploadFile($request->file('declaration_honneur'));
                $demandePieceP002Repository->setChemin($cheminDeclarationHonneur, $demande->uuid, 'Déclaration sur l’honneur de l’exactitude des informations');
                DB::table('demande_piece_p002_s')->where('chemin',  $request->declaration_honneur)->delete();
                @unlink($request->declaration_honneur);
            }
            //Enregistrement des documents du personnel
            if ($request->libelle_document && sizeof($request->libelle_document) > 0) {
                $n = sizeof($request->libelle_document);
                for ($i = 0; $i < $n; $i++) {
                    $chemin = $this->repository->uploadFile($request->file('fichier_document')[$i]);
                    $demandePieceP002Repository->setChemin($chemin, $demande->uuid, $request->libelle_document[$i]);
                }
            }
            //Enregistrement des documents pour le matériel roulant
            if ($request->libelle_document_roulant && sizeof($request->libelle_document_roulant) > 0) {
                $n = sizeof($request->libelle_document_roulant);
                for ($i = 0; $i < $n; $i++) {
                    $chemin = $this->repository->uploadFile($request->file('fichier_document_roulant')[$i]);
                    $demandePieceP002Repository->setChemin($chemin, $demande->uuid, $request->libelle_document_roulant[$i]);
                }
            }
              //Enregistrement des documents pour le matériel non roulant
            if ($request->libelle_document_non_roulant && sizeof($request->libelle_document_non_roulant) > 0) {
                $n = sizeof($request->libelle_document_non_roulant);
                for ($i = 0; $i < $n; $i++) {
                    $chemin = $this->repository->uploadFile($request->file('fichier_document_non_roulant')[$i]);
                    $demandePieceP002Repository->setChemin($chemin, $demande->uuid, $request->libelle_document_non_roulant[$i]);
                }
            }
            
            
          // return json_encode(array('status' => 'success'));
        return redirect('/demandes-lists?procedure=OATEA')->with('success', 'Votre Demande à bien été modifiée et en cours de traitement !!');
        //return json_encode(array('status' => 'fail'));
    }
    public function getSousDomaineByCategorie(Request $request) {
        $sousDomaines = $this->repository->getSousDomaine(['demande_domaine_p002_id' => $request->domaine, 'demande_categorie_p002_id' => $request->categorie]);
        print json_encode(array('sousDomaines' => $sousDomaines, 'status' => 'success'));
    }
    public function deleteAutreDocument(Request $request) {
        DB::table('demande_piece_p002_s')->where('uuid',  $request->uuid)->delete();
        @unlink($request->chemin);
        print json_encode(array('status' => 'success'));
    }

}
