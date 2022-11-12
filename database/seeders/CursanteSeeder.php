<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cursante;

class CursanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Cursante::create([
            'nombre' => 'Victor',
            'apellido' => 'Silgado',
            'cedula' => '125478',
            'fecha_nacimiento' => '1972-11-01',
            'telefono' => '57302854925',
            'correo' => 'efreet111@gmail.com',
            'parroquia_id' => '1'

        ]);
    }
}
