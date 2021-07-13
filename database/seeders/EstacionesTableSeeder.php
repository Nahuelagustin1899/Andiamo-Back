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
            'nombre' => "Estación "
        ]);
        Estacion::create([
            'id' => 2,
            'nombre' => "Estación Retiro"
        ]);
        Estacion::create([
            'id' => 3,
            'nombre' => "Estación Ramos Mejía"
        ]);
        Estacion::create([
            'id' => 4,
            'nombre' => "Estación Mar de Ajó"
        ]);
        Estacion::create([
            'id' => 5,
            'nombre' => "Estación Santa Teresita"
        ]);
        Estacion::create([
            'id' => 6,
            'nombre' => "Estación San Clemente"
        ]);
        Estacion::create([
            'id' => 7,
            'nombre' => "Estación Mar del Tuyú"
        ]);
        Estacion::create([
            'id' => 8,
            'nombre' => "Estación San Bernardo"
        ]);
        Estacion::create([
            'id' => 9,
            'nombre' => "Estación Miramar"
        ]);
        Estacion::create([
            'id' => 10,
            'nombre' => "Estación Villa Gesell"
        ]);
        
    }
}
