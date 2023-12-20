<?php

namespace Database\Seeders;

use App\Models\PieceJointe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PieceJointeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PieceJointe::create([
            "libelle" => "Statut société"
        ]);
        PieceJointe::create([
            "libelle" => "RCCM/RSCPM"
        ]);
        PieceJointe::create([
            "libelle" => "IFU/Recepissé"
        ]);
        PieceJointe::create([
            "libelle" => "Certificat de capacité finacière"
        ]);
        PieceJointe::create([
            "libelle" => "Aggreement techniques"
        ]);
        PieceJointe::create([
            "libelle" => "Inventaire matériel"
        ]);
        PieceJointe::create([
            "libelle" => "Liste du personnelle"
        ]);
        PieceJointe::create([
            "libelle" => "CV"
        ]);
        PieceJointe::create([
            "libelle" => "Diplôme/Certificat"
        ]);
        PieceJointe::create([
            "libelle" => "Déclaration sur l'honneur"
        ]);
    }
}
