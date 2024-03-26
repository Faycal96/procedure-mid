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
        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer('fr');
        $montant = $numberTransformer->toWords($demande->montant);
        # 2. On génère un QR code de taille 200 x 200 px
    	$qrcode = QrCode::size(200)->generate("Je suis un QR Code");
        //dd($qrcode);
        $data =  [
            "demande" => $demande,
            "statut" => StatutDemande::where(["etat" => $demande->etat])->first("libelle"),
            "montant" => $montant,
            "qrCode" => $qrcode
        ];
        
       // dd($data);
        $pdf = Pdf::loadView("etats.quittance",$data);
       // $pdf->setPaper("A5", "portrait");
        return $pdf->download($demande->uuid.".pdf");
    }

    // L'action "generate" de la route "simple-qrcode" (GET)
    public function generate () {

    	# 2. On génère un QR code de taille 200 x 200 px
    	$qrcode = QrCode::size(200)->generate("Je suis un QR Code");
    	
    	# 3. On envoie le QR code généré à la vue "simple-qrcode"
    	return view("simple-qrcode", compact('qrcode'));
    }

}