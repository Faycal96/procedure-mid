<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\StatutDemande;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class EtatController extends Controller
{
    public function index($id, Request $request){

        $demande = Demande::find($id);
        $data =  [
            "demande" => $demande,
            "statut" => StatutDemande::where(["etat" => $demande->etat])->first("libelle")
        ];
        
       // dd($data);
        $pdf = Pdf::loadView("etats.pdf",$data);
        return $pdf->download($demande->uuid.".pdf");
    }
}