<?php

namespace Database\Seeders;

use App\Models\StatutDemande;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatutDemandeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StatutDemande::create([
            "etat" => "D",
            "libelle" =>"Attente de vérification",
            "statut" => "Demande déposée"
        ]);
        StatutDemande::create([
            "etat" => "C",
            "libelle" =>"Attente de complément de dossier",
            "statut" => "Demande de complément de dossier"
        ]);
        StatutDemande::create([
            "etat" => "E",
            "libelle" =>"En cours d'étude",
            "statut" => "Demande en étude"
        ]);
        StatutDemande::create([
            "etat" => "R",
            "libelle" =>"Demande réjetée",
            "statut" => "Demande réjetée"
        ]);
        StatutDemande::create([
            "etat" => "V",
            "libelle" =>"En attente de visa",
            "statut" => "Demande validée"
        ]);
        StatutDemande::create([
            "etat" => "S",
            "libelle" =>"Actes signé",
            "statut" => "Demande signée"
        ]);
        StatutDemande::create([
            "etat" => "A",
            "libelle" =>"Demande archivée",
            "statut" => "Demande archivée"
        ]);
        StatutDemande::create([
            "etat" => "N",
            "libelle" =>"Devis envoyé",
            "statut" => "Devis envoyé"
        ]);
    }
}
