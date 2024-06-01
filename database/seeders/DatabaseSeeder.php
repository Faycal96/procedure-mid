<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            LocaliteTableSeeder::class,
            StatutDemandeSeeder::class,
            ProcedureSeeder::class,
            PaysSeeder::class,
            TypeUsagerSeeder::class,
            RoleSeeder::class,
            TypeConstructionSeeder::class,
            UsageConstructionSeeder::class,
            CategorieDemandeSeeder::class,
            PieceJointeSeeder::class,
            ProcedurePieceJointeSeeder::class,
            MotifSeeder::class,
            ModePaiementSeeder::class
        ]);
    }
}
