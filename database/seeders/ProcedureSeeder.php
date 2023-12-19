<?php

namespace Database\Seeders;

use App\Models\Agent;
use App\Models\Role;
use App\Models\Structure;
use App\Models\Service;
use App\Models\Procedure;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProcedureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $strDSI =   Structure::create([
            "libelle_court" => "DSI",
            "libelle_long" =>"Direction des Services Informatiques",
            
        ]);
        $strDSI->save();
         
        $servDSI = Service::create([
            "libelle_court" => "DSI",
            "libelle_long" =>"Direction des Services Informatiques",
            "structure_id"=> $strDSI->uuid
        ]);
       
        $servDSI->save();
        
       $roleAdmin =  Role::create([
            "libelle" => "Administration",
            "code" =>"ADMIN",
            
        ]);

        $roleAdmin->save();

      $agent =   Agent::create([
            "nom" => "MEEA",
            "prenom" => "MEEA",
            "matricule" => "782255G",
            "service_id" => $servDSI->uuid,
            "role_id" => $roleAdmin->uuid,
        ]);
$agent->save();

        User::create([
            'name' => 'adminMeea',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456789'),
            'agent_id' => $agent->uuid,
            'role_id'=>$roleAdmin->uuid
        ]);





        $str1 =   Structure::create([
            "libelle_court" => "DGESS",
            "libelle_long" =>"Direction Générale des Etudes et des Statistiques Sectorielles",
          
        ]);
        $str1->save();
       $serv1 =  Service::create([
            "libelle_court" => "DGESS",
            "libelle_long" =>"Direction Générale des Etudes et des Statistiques Sectorielles",
            "structure_id"=> $str1->uuid
        ]);
        $serv1->save();
        
        $str2 =   Structure::create([
            "libelle_court" => "LNBTP",
            "libelle_long" =>"Laboratoire National du Bâtiment et des Travaux Publics",
           
        ]);
        $str2->save();
        $serv2 =  Service::create([
            "libelle_court" => "LNBTP",
            "libelle_long" =>"Laboratoire National du Bâtiment et des Travaux Publics",
            "structure_id"=> $str2->uuid
         ]);
         $serv2->save();



        Procedure::create([
            "libelle_court" => "DSAT",
            "libelle_long" =>"Délivrance et suspension de l’agrément technique",
            "description" => "Description de délivrance et de suspension de l’agrément technique.",
            "img" => "img/route1.jpeg",
            "code_color" => "#359b27",
            "code" => "P002",
            "service_id"=>$serv1->uuid,
            "delai"=> "32",
            "tarif" => 1500
        ]);


        Procedure::create([
            "libelle_court" => "DESF",
            "libelle_long" =>"Demandes d'étude de sols et de fondations",
            "description" => "Description de demande d'étude de sols et de fondation",
            "img" => "img/sol1.jpg",
            "code_color" => "#f26b56",
            "code" => "P001",
            "service_id"=>$serv2->uuid,
            "delai"=> "32",
            "tarif" => 1600
        ]);


      
    }
}