<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Empresa;

class EmpresasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empresa::create([
            'nombre' => "Chevallier",
            'logo' => 'chevalier.png',
            'informacion' => 'Nueva Chevallier S.A. es una empresa de ómnibus de larga distancia de origen argentino. Fue fundada el 5 de junio de 1935 por el Ingeniero Chevallier Boutell bajo el nombre Transportes Automotores Chevallier.'
        ]);
        Empresa::create([
            'nombre' => "Plusmar",
            'logo' => 'plusmar.png',
            'informacion' => 'El 16 de noviembre de 1976, en la ciudad de Quilmes y gracias al esfuerzo y experiencia de su fundador, Don Niper Teruel, nace TRANSPORTES AUTOMOTORES PLUSMAR S.A.'
        ]);
        Empresa::create([
            'nombre' => "Cata",
            'logo' => 'cata.jpg',
            'informacion' => 'En 1933 nació la Compañía Argentina de Transporte Automóvil (C.A.T.A.), fundada por el Sr. Juan E. Ramoni, la cual ofrece servicios de transporte.'
        ]);
        Empresa::create([
            'nombre' => "Flecha Bus",
            'logo' => 'flechabus.png',
            'informacion' => 'La Empresa de Transporte de Derudder Hermanos S.R.L., más conocida como Flecha Bus o Flecha, es una empresa de ómnibus de larga distancia y grupo empresarial de Argentina dedicado al transporte público de pasajeros y al turismo. '
        ]);
        Empresa::create([
            'nombre' => "Ruta Atlántica",
            'logo' => 'ruta.jpg',
            'informacion' => 'Nuestra prioridad es lograr la satisfacción del cliente en servicio, puntualidad, costo y calidad en todos los aspectos de nuestra empresa.'
        ]);
    }
}
