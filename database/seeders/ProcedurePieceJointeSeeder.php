<?php

namespace Database\Seeders;

use App\Models\Demande;
use App\Models\PieceJointe;
use App\Models\Procedure;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProcedurePieceJointeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $procedureP002 = Procedure::where('code', 'P002')->first();
        $pj1 = PieceJointe::where('libelle', "Statut société")->first()->uuid;
        $pj2 = PieceJointe::where('libelle', "RCCM/RSCPM")->first()->uuid;
        $pj3 = PieceJointe::where('libelle', "IFU/Recepissé")->first()->uuid;
        $pj4 = PieceJointe::where('libelle', "Certificat de capacité finacière")->first()->uuid;
        $pj5 = PieceJointe::where('libelle', "Aggreement techniques")->first()->uuid;
        $pj6 = PieceJointe::where('libelle', "Inventaire matériel")->first()->uuid;
        $pj7 = PieceJointe::where('libelle', "Liste du personnelle")->first()->uuid;
        $pj8 = PieceJointe::where('libelle', "Diplôme/Certificat")->first()->uuid;
        $pj9 = PieceJointe::where('libelle', "Déclaration sur l'honneur")->first()->uuid;
        $pj10 = PieceJointe::where('libelle', "CV")->first()->uuid;
        
        $procedureP002->pieceJointe()->attach($pj1);
        $procedureP002->pieceJointe()->attach($pj2);
        $procedureP002->pieceJointe()->attach($pj3);
        $procedureP002->pieceJointe()->attach($pj4);
        $procedureP002->pieceJointe()->attach($pj5);
        $procedureP002->pieceJointe()->attach($pj6);
        $procedureP002->pieceJointe()->attach($pj7);
        $procedureP002->pieceJointe()->attach($pj8);
        $procedureP002->pieceJointe()->attach($pj9);
        $procedureP002->pieceJointe()->attach($pj10);
        $procedureP002->save();

        $procedureP001 = Procedure::where('code', 'P001')->first();
        $pj11 = PieceJointe::where('libelle', "PUH/Attestation d'attribution")->first()->uuid;
        $pj12 = PieceJointe::where('libelle', "Plan de masse/plan d'implantation")->first()->uuid;
        $pj13 = PieceJointe::where('libelle', "Vue en plan et coupe du batiment")->first()->uuid;
        $pj14 = PieceJointe::where('libelle', "Copie CNIB")->first()->uuid;

        $procedureP001->pieceJointe()->attach($pj11);
        $procedureP001->pieceJointe()->attach($pj12);
        $procedureP001->pieceJointe()->attach($pj13);
        $procedureP001->pieceJointe()->attach($pj14);
        $procedureP001->save();
    }
}
