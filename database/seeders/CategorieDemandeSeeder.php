<?php

namespace Database\Seeders;

use App\Models\CategorieDemande;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieDemandeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategorieDemande::create([
            "code" => "TH",
            "libelle" => "TH",
            "code_procedure" => "P002",
            "montant" => 50000
        ]);
        CategorieDemande::create([
            "code" => "TR1",
            "libelle" => "TR1",
            "code_procedure" => "P002",
            "montant" => 200000
        ]);
        CategorieDemande::create([
            "code" => "TR2",
            "libelle" => "TR2",
            "code_procedure" => "P002",
            "montant" => 300000
        ]);
        CategorieDemande::create([
            "code" => "TR3",
            "libelle" => "TR3",
            "code_procedure" => "P002",
            "montant" => 500000
        ]);
        CategorieDemande::create([
            "code" => "EC",
            "libelle" => "EC",
            "code_procedure" => "P002",
            "montant" => 200000
        ]);
    }
}
