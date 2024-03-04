<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class EtatController extends Controller
{
    public function index(){

        $data = [
            'demandes' => Demande::all(),
        ];
        $pdf = Pdf::loadView("etats.pdf");
        return $pdf->download();
    }
}