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
            
           'identite' => 'required',
            'commune_id' => 'required',
            'beneficiaire' => 'required',
            'ifu' => 'required',
            'rccm' => 'required',
           'categorie_id' => 'required',
           
        ];
        return $baseRules;
    }
    public function messages(){

      $message = [
        
        'identite.required' =>'Identité : est obligtoire',
        'commune_id.required' =>'Lieu de Residence : est obligatoire',
        'beneficiaire.required' => 'Bénéficiaire : est obligatoire',
        'ifu.required'=>'Certificat IFU : est requis',
        'rccm.required' =>'Attestation RCCM : est obligatoire',
        'categorie_id.required' => 'Catégorie : est obligatoire',
        
        ];
        return $message;
    }
}
