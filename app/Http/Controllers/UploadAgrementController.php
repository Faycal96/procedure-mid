<?php

namespace App\Http\Controllers;

use App\Models\UploadAgrement;
use App\Http\Requests\StoreUploadAgrementRequest;
use App\Http\Requests\UpdateUploadAgrementRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadAgrementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $listeAgrement = UploadAgrement::all(); 
        return view("agrementAprouve", ["listeAgrement" => $listeAgrement]);
    }

    public function indexAdmin(Request $request){
        $agrements = UploadAgrement::all();
           
        return view('/backend/list_agrement', ['objectList' => $agrements, ]);
   }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [            
            'Annee' => 'required',
            'libelle'=>'required',
            'chemin' => 'required'
        ]);

        Storage::makeDirectory('public/arrete_agrement');
        $chemin =   $request->chemin->store('public/arrete_agrement');

        $object = new UploadAgrement();
        $object->Annee = $request->Annee;
        $object->libelle = $request->libelle;
        $object->chemin = $chemin;
        $object->save();

        return redirect('/')->with('success', 'Objet enregistré !!');
    }

    /**
     * Display the specified resource.
     */
    public function show(UploadAgrement $uploadAgrement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UploadAgrement $uploadAgrement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $uuid)
    {
        //
        // $this->validate($request, [            
        //     'Annee' => 'required',
        //     'libelle'=>'required',
        // ]);

        // dd("oi");
        $object = UploadAgrement::find($uuid);
        $object->Annee = $request->Annee;
        $object->libelle = $request->libelle;
        if( isset($request->chemin) )
        {
            Storage::makeDirectory('public/arrete_agrement');
            $chemin =   $request->chemin->store('public/arrete_agrement');
            $object->chemin = $chemin;
        }
        $object->save();

        return redirect('/')->with('success', 'Objet enregistré !!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UploadAgrement $uploadAgrement)
    {
        //
    }
}
