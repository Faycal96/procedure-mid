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
            //StructureSeeder::class

           //UsersTableSeeder::class

           // UsersTableSeeder::class
            AgremenTechniqueTableSeeder::class,
            UsageConstructionSeeder::class
          // UsersTableSeeder::class

        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
