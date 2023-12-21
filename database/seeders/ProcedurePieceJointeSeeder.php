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
        $procedureP001 = Procedure::where('code', 'P001')->first();
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
        
        $procedureP001->pieceJointe()->attach($pj1);
        $procedureP001->pieceJointe()->attach($pj2);
        $procedureP001->pieceJointe()->attach($pj3);
        $procedureP001->pieceJointe()->attach($pj4);
        $procedureP001->pieceJointe()->attach($pj5);
        $procedureP001->pieceJointe()->attach($pj6);
        $procedureP001->pieceJointe()->attach($pj7);
        $procedureP001->pieceJointe()->attach($pj8);
        $procedureP001->pieceJointe()->attach($pj9);
        $procedureP001->pieceJointe()->attach($pj10);
        $procedureP001->save();
    }
}
