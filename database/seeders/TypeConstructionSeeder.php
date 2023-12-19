<?php

namespace Database\Seeders;

use App\Models\TypeConstruction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeConstructionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeConstruction::create([
            'code' => "RDC",
            'libelle' => "Rez de chaussée"
        ]);
        TypeConstruction::create([
            'code' => "R1",
            'libelle' => "R+1"
        ]);
        TypeConstruction::create([
            'code' => "R2",
            'libelle' => "R+2"
        ]);
        TypeConstruction::create([
            'code' => "R3",
            'libelle' => "R+3"
        ]);
        TypeConstruction::create([
            'code' => "R4LEGER",
            'libelle' => "R+4 Avec dalle léger"
        ]);
        TypeConstruction::create([
            'code' => "R4INAC",
            'libelle' => "R+4 avec dalle inaccessible"
        ]);
        TypeConstruction::create([
            'code' => "R4ACC",
            'libelle' => "R+4 avec dalle accessible"
        ]);
    }
}
