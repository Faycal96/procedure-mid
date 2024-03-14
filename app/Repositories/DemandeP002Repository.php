<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\Procedure;
use App\Models\Demande;
use App\Models\DemandePiece;
use App\Models\DemandeP002;
use App\Models\ActiviteDemandeP002;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class DemandeP001Repository.
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

    
    /**
     * Create a new model record in the database.
     *
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $data)
    {
        $demandeVar=Demande::create([
            'date_demande' => Carbon::parse(Carbon::now())->format('Ymd'),
            'etat' => 'D',
            'libelle_court' => "DSAT", 
            'identite' => $data["beneficiaire"],
            'commune_id' => $data["commune_id"], //$data["commune_id,
            'beneficiaire' => "Ali", //$data["beneficiaire,
            'procedure_id' => Procedure::where(['code' => 'P002'])->first('uuid')->uuid,
            'reference' => $data['reference'],
            'delai' => Procedure::where(['code' => 'P002'])->first('delai')->delai,
            'montant' => 1,
            'date_certif' => Carbon::parse(Carbon::now())->format('Ymd'),
            'usager_id' => Auth::user()->usager_id,
            'last_modified_by' => Auth::user()->usager_id,
            'is_certified' => true,
            
             // infos sur le type de demande
            'objectif_demande' => $data["objectif_demande"],
            'categorie_id' =>  $data["categorie"], //CategorieDemande::where(['code' => $data["categorie ])->first('uuid')->uuid,

            // infos sur l'entreprise
            'beneficiaire' =>  $data["beneficiaire"], 
            'raison_social' =>  $data["raison_social"], 
            'siege_social' =>  $data["siege_social"], 
            'boite_postale' =>  $data["boite_postale"], 
            'fax' =>  $data["fax"], 
            'tel_1' =>  $data["tel_1"], 
            'email_entreprise' =>  $data["email_entreprise"], 
            'adresse_physique' =>  $data["adresse_physique"], 

            // infos sur le representant de l'entrepise
            'nom_representant' =>  $data["nom_representant"], 
            'prenom_representant' =>  $data["prenom_representant"], 
            'fonction_representant' =>  $data["fonction_representant"], 
            'adresse_representant' =>  $data["adresse_representant"], 
        ]);

        $demandeP002Var=DemandeP002::create([
            "demande_id"=>$demandeVar->uuid,
            "numero_cnss_entreprise"=>$data["numero_cnss_entreprise"],
        ]);
            

        //$dataFiles['procedure_id'] = Procedure::where(['code' => 'P002'])->first('uuid')->uuid;
        $statutSociete =  $this->uploadFile($data, 'statutSociete');
        $rccm =  $this->uploadFile($data, 'rccm');
        $ifu =  $this->uploadFile($data, 'ifu');
        $chiffreAffaire =  $this->uploadFile($data, 'chiffreAffaire');
        $ancienAgrement =  $this->uploadFile($data, 'ancienAgrement');
        $listeMateriel =  $this->uploadFile($data, 'listeMateriel');
        $listePersonnel =  $this->uploadFile($data, 'listePersonnel');

        DemandePiece::create([
            "libelle" => "Statut de la société",
            "chemin" => $statutSociete,
            "demande_id" => $demandeVar->uuid
        ]);
        DemandePiece::create([
            "libelle" => "RCCM",
            "chemin" => $rccm,
            "demande_id" => $demandeVar->uuid
        ]);
        DemandePiece::create([
            "libelle" => "IFU",
            "chemin" => $ifu,
            "demande_id" => $demandeVar->uuid
        ]);
        DemandePiece::create([
            "libelle" => "Chiffre d'affaire",
            "chemin" => $chiffreAffaire,
            "demande_id" => $demandeVar->uuid
        ]);
        DemandePiece::create([
            "libelle" => "Ancien agrément",
            "chemin" => $ancienAgrement,
            "demande_id" => $demandeVar->uuid
        ]);
        DemandePiece::create([
                "libelle" => "Liste matériel",
            "chemin" => $listeMateriel,
            "demande_id" => $demandeVar->uuid
        ]);
        DemandePiece::create([
                "libelle" => "Liste personnel",
            "chemin" => $listePersonnel,
            "demande_id" => $demandeVar->uuid
        ]);


        if( isset($data['fichier_document_CV'] )){
            foreach($data['fichier_document_CV'] as $index => $cv) {
                $var = $this->uploadAFile($cv);
                DemandePiece::create([
                    "libelle" => $data['libelle_document_CV'][$index],
                    "chemin" => $var,
                    "demande_id" => $demandeVar->uuid
                ]);
            }
        }


        if( isset($data['fichier_document_diplome'] )){
            foreach($data['fichier_document_diplome'] as $index => $diplome) {
                $var = $this->uploadAFile($diplome);
                DemandePiece::create([
                    "libelle" => $data['libelle_document_diplome'][$index],
                    "chemin" => $var,
                    "demande_id" => $demandeVar->uuid
                ]);
            }
        }


        if( isset($data['localisation'] )){
            foreach($data['localisation'] as $index => $loc) {
                ActiviteDemandeP002::create([
                    "localisation" => $data['localisation'][$index],
                    "designation" => $data['designation'][$index],
                    "maitre_ouvrage" => $data['maitre_ouvrage'][$index],
                    "date_debut" => $data['date_debut'][$index],
                    "date_fin" => $data['date_fin'][$index],
                    "montany_travaux" => $data['montany_travaux'][$index],
                    "nature" => $data['nature'][$index],
                    "condition" => $data['condition'][$index],
                    "pourcentage_montant_total" => $data['pourcentage_montant_total'][$index],
                    "observations" => $data['observations'][$index],
                    "demande_p002_id" => $demandeP002Var->uuid,
                ]);
            }
        }

        $this->unsetClauses();

        /*foreach ($data["fichier_document_CV"] as $fichier_document_CV) {
        }

        foreach ($data["cvs"] as $cv_value) {
            ActiviteDemandeP002::create([
                "demande_p002_id"=>$demandeP002Var->uuid,
                "localisation"=>$cv_value["localisation"],
                "designation"=>$cv_value["designation"],
                "maitre_ouvrage"=>$cv_value["maitre_ouvrage"],
                "date_debut"=>$cv_value["date_debut"],
                "date_fin"=>$cv_value["date_fin"],
                "montany_travaux"=>$cv_value["montany_travaux"],
                "nature"=>$cv_value["nature"],
                "condition"=>$cv_value["condition"],
                "pourcentage_montant_total"=>$cv_value["pourcentage_montant_total"],
                "observations"=>$cv_value["observations"],            
            ]);            
        }*/

        return $demandeVar;
    }
}
