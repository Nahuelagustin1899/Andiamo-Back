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
            'nombre' => "Estación Liniers"
        ]);
        Estacion::create([
            'nombre' => "Estación Retiro"
        ]);
        Estacion::create([
            'nombre' => "Estación Ramos Mejía"
        ]);
        Estacion::create([
            'nombre' => "Estación Mar de Ajó"
        ]);
        Estacion::create([
            'nombre' => "Estación Santa Teresita"
        ]);
        Estacion::create([
            'nombre' => "Estación San Clemente"
        ]);
        Estacion::create([
            'nombre' => "Estación Mar del Tuyú"
        ]);
        Estacion::create([
            'nombre' => "Estación San Bernardo"
        ]);
        Estacion::create([
            'nombre' => "Estación Miramar"
        ]);
        Estacion::create([
            'nombre' => "Estación Villa Gesell"
        ]);
        
    }
}
