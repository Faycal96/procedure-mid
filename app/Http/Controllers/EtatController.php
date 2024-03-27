<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\StatutDemande;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Proengsoft\JsValidation\Facades\JsValidatorFacade;
use Proengsoft\JsValidation\JsValidatorFactory;
use NumberToWords\NumberToWords;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class EtatController extends Controller
{

    public function index($id, Request $request){
        $demande = Demande::find($id);
        $data =  [
            "demande" => $demande,
            "statut" => StatutDemande::where(["etat" => $demande->etat])->first("libelle"),
        ];
        
       // dd($data);
        $pdf = Pdf::loadView("etats.pdf",$data);
       // $pdf->setPaper("A5", "portrait");
        return $pdf->stream($demande->uuid.".pdf");
    }

}