<?php

namespace Database\Seeders;

use App\Models\Demande;
use App\Models\UsageConstruction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsageConstructionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UsageConstruction::create([
            'code' => "HAB",
            'libelle' => "Habitation"
        ]);
        // sleep(1);
        UsageConstruction::create([
            'code' => "COMM",
            'libelle' => "Commerciale"
        ]);
        // sleep(1);
        UsageConstruction::create([
            'code' => "MIXT",
            'libelle' => "Mixte"
        ]);
        // sleep(1);
        UsageConstruction::create([
            'code' => "AUT",
            'libelle' => "AUTRES"
        ]);
        
    }
}
