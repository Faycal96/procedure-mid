<?php

namespace App\Http\Controllers;
use App\Models\Plainte;
use App\Models\Procedure;

use App\Repositories\PlainteRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlainteController extends Controller
{

    public $repository;
    public function __construct(PlainteRepository $repository)
    {
        $this->repository = $repository;
    }


    //
    public function plainteForm(){
        $procedures = Procedure::all();
        return view("plainte",["procedures" => $procedures]);
    }



    public function plainteStore(Request $request){
         // Form validation
         $this->validate($request, [            
            'procedure' => 'required',
            'subject'=>'required',
            'message' => 'required'
         ]);

         $plainte = new Plainte(); 
         $plainte->procedure = $request->procedure; 
         $plainte->subject = $request->subject; 
         $plainte->message = $request->message;
         $plainte->usager_id = Auth::user()->usager_id; // Auth::user()->usager->uuid;
         $plainte->save();      // ou Plainte::create($request->all());

        return redirect('/')->with('success', 'Votre plainte à bien été soumise et est en cours de traitement !!');
    }




    // recuperation de la liste des plaintes
    public function listePlainte(Request $request, $procedure="Toutes"){

        if($procedure == "Toutes"){
            $listePlainte = Plainte::all()->sortByDesc("etat");
        }else{
            $listePlainte = Plainte::all()->where('procedure', "$procedure")->sortByDesc("etat");
        }

        $procedures = Procedure::all();

        $selectedProcedure = $procedure;

        //$listePlainte = Plainte::all()->sortByDesc("etat");
        // $listePlainte = $this->repository->all();                
        return view('/backend/list_plaintes', ['procedures' => $procedures, 'selectedProcedure' => $selectedProcedure,'listePlainte' => $listePlainte ]);
   }



    // modifie l'etat d'une plainte
    public function editPlainte(Request $request, $uuid){

        $plainte = Plainte::find($uuid); 
		$plainte->etat = $request->etat;
		$plainte->commentaire = $request->commentaire;
		$plainte->user_id = Auth::user()->uuid; // "c98a27b7-c1ce-40e4-9914-6f2cc4fa1d30";
		$plainte->save();
        
        return redirect()->back()->with('success', 'Plainte modifier avec succes !');
   }
}
