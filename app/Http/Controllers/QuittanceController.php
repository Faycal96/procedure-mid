<?php

namespace App\Http\Controllers;

use App\Models\CategorieDemande;
use App\Models\Demande;
use App\Models\Procedure;
use App\Models\StatutDemande;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Proengsoft\JsValidation\Facades\JsValidatorFacade;
use Proengsoft\JsValidation\JsValidatorFactory;
use NumberToWords\NumberToWords;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class QuittanceController extends Controller
{

    public function index($id, Request $request){
        $demande = Demande::find($id);
        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer('fr');
        $montant = $numberTransformer->toWords($demande->montant);
        # 2. On génère un QR code de taille 200 x 200 px
    	//$qrcode = QrCode::size(100)->generate("Je suis un QR Code");
        $donneQrCode = env('APP_URL')."/quittance/".$id;
        $qrcode = base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate($donneQrCode));
        //dd($qrcode);
        $fraisTimbre = Procedure::where("code", "=", "P002" )->first()->frais_timbre;
        $fraisDossier = Procedure::where("code", "=", "P002" )->first()->frais_dossier;

        $montantTH = CategorieDemande::where("code", "=", "TH" )->first()->montant;
        $montantTR1 = CategorieDemande::where("code", "=", "TR1" )->first()->montant;
        $montantTR2 = CategorieDemande::where("code", "=", "TR2" )->first()->montant;
        $montantTR3 = CategorieDemande::where("code", "=", "TR3" )->first()->montant;
        $montantEC = CategorieDemande::where("code", "=", "EC" )->first()->montant;

        $data =  [
            "demande" => $demande,
            "statut" => StatutDemande::where(["etat" => $demande->etat])->first("libelle"),
            "montant" => $montant,
            "qrCode" => $qrcode,
            "fraisTimbre"=>$fraisTimbre,
            "fraisDossier"=>$fraisDossier,
            "montantTH" =>$montantTH,
            "montantTR1" =>$montantTR1,
            "montantTR2" =>$montantTR2,
            "montantTR3" =>$montantTR3,
            "montantEC" =>$montantEC,
        ];
        
       // dd($data);
        $pdf = Pdf::loadView("etats.quittance",$data);
       // $pdf->setPaper("A5", "portrait");
        return $pdf->stream($demande->uuid.".pdf");
    }

    // L'action "generate" de la route "simple-qrcode" (GET)
    public function generate () {

    	# 2. On génère un QR code de taille 200 x 200 px
    	$qrcode = QrCode::size(200)->generate("Je suis un QR Code");
    	
    	# 3. On envoie le QR code généré à la vue "simple-qrcode"
    	return view("simple-qrcode", compact('qrcode'));
    }

}