<?php

namespace Database\Seeders;

use App\Models\ModePaiement;
use App\Models\ModePaiment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModePaiementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModePaiement::create([
           
            "libelle" => "Moov",
           
            "ordre" => 0
        ]);
        ModePaiement::create([
         
            "libelle" => "Orange",
           
            "ordre" => 1
        ]);
      

      
   
   
   
    }
}
