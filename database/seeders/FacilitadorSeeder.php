<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Facilitador;
class FacilitadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Facilitador::create([
            'nombre' => 'Jose',
            'apellido' => 'Padrino',
            'cedula' => '23622891',
            'fecha_nacimiento' => '1992-08-28',
            'telefono' => '04267133318',
            'correo' => 'jospadri@gmail.com',
            'parroquia_id' => '1'
        ]);
    }
}
