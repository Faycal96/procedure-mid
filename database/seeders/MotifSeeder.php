<?php

namespace Database\Seeders;

use App\Models\Motif;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MotifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Motif::create([
           
            "libelle" => "Présence d’au moins une pièce administrative non conforme",
            "code_procedure" => "P002",
            "ordre" => 1
        ]);
        Motif::create([
         
            "libelle" => "Antériorité du matériel",
            "code_procedure" => "P002",
            "ordre" => 2
        ]);
        Motif::create([
           
            "libelle" => "Présence d’au moins d’une carte grise du matériel non conforme",
            "code_procedure" => "P002",
            "ordre" => 3
        ]);
        Motif::create([
            "libelle" => "Matériel minimum requis incomplet",
            "code_procedure"=> "P002",
            "ordre" => 4
          
        ]);
        Motif::create([
            
            "libelle" => "Non inscription du bureau d’études au tableau de l’ordre des ingénieurs",
            "code_procedure" => "P002",
            "ordre" => 5
        ]);

      /*  Motif::create([
            
            "libelle" => "AUTRES",
            "code_procedure" => "P002",
            "ordre" => 6
        ]);*/
   
   
   
   
   
   
   
        Motif::create([
           
            "libelle" => "PUH non conforme",
            "code_procedure" => "P001",
            "ordre" => 1
        ]);
        Motif::create([
         
            "libelle" => "Manque de plans de vues",
            "code_procedure" => "P001",
            "ordre" => 2
        ]);
        Motif::create([
         
            "libelle" => "Manque de coupes détaillées",
            "code_procedure" => "P001",
            "ordre" => 3
        ]);
        Motif::create([
           
            "libelle" => "Pas de précision de l'état du site actuelle",
            "code_procedure" => "P001",
            "ordre" => 4
        ]);
        Motif::create([
            "libelle" => "Pas de précision de la superficie de l'emprise du projet",
            "code_procedure"=> "P001",
            "ordre" => 5
          
        ]);
      /*  Motif::create([
            
            "libelle" => "AUTRES",
            "code_procedure" => "P001",
            "ordre" => 6
        ]);*/

   
   
   
    }
}
