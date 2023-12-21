<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
class StoreDemandeP002Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */


    public function rules(){
        $baseRules = [
            /*
           'identite' => 'required',
            'commune_id' => 'required',
            'beneficiaire' => 'required',
            'recu_achat_dossier' => 'required',
            'ifu' => 'required',
            'rccm' => 'required',
            'cnss' => 'required',
           'fiche_renseignement' => 'required',
           'declaration_honneur' => 'required',
           'domaine' => 'required',
           'categorie' => 'required',
           'sous_domaine' => 'required',
           'confirmed'  => 'required'
           */
        ];
        return $baseRules;
    }
    public function messages(){

      $message = [
        /*
        'identite.required' =>'Identité : est obligtoire',
        'commune_id.required' =>'Lieu de Residence : est obligatoire',
        'beneficiaire.required' => 'Bénéficiaire : est obligatoire',
        'recu_achat_dossier.required' => 'Reçu d’achat du dossier de demande : est obligatoire',
        'ifu.required'=>'Certificat IFU : est requis',
        'rccm.required' =>'Attestation RCCM : est obligatoire',
        'cnss.required'=>'Attestation employeur CNSS : est obligatoire',
        'fiche_renseignement.required'=>'Fiche Renseignement : est obligatoire',
        'declaration_honneur.required'=>'Déclaration sur l’honneur de l’exactitude des informations : est obligatoire',
        'domaine.required' => 'Domaine : est obligatoire',
        'categorie.required' => 'Catégorie : est obligatoire',
        'sous_domaine.required' => 'Sous domaine : est obligatoire',
        'confirmed.required' => 'Cocher la case de certification : est obligatoire',
        */
        ];
        return $message;
    }
}
