<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Facilitador;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
            
            $this->call(EstadoSeeder::class);
            $this->call(MunicipioSeeder::class);
            $this->call(ParroquiaSeeder::class);
            $this->call(CursanteSeeder::class);
            $this->call(UserSeeder::class);
            $this->call(FacilitadorSeeder::class);
            //Facilitador::factory(50)->create();

           
    }
}
