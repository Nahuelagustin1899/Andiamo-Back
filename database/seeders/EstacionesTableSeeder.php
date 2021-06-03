<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Estacion;

class EstacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estacion::create([
            'id' => 1,
            'nombre' => "Estacion Liniers"
        ]);
        Estacion::create([
            'id' => 2,
            'nombre' => "Estacion Retiro"
        ]);
        Estacion::create([
            'id' => 3,
            'nombre' => "Estacion Ramos Mejía"
        ]);
        Estacion::create([
            'id' => 4,
            'nombre' => "Estacion Mar de Ajó"
        ]);
        Estacion::create([
            'id' => 5,
            'nombre' => "Estacion Santa Teresita"
        ]);
        Estacion::create([
            'id' => 6,
            'nombre' => "Estacion San Clemente"
        ]);
    }
}
