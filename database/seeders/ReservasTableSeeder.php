<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reserva;

class ReservasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reserva::create([
            'user_id' => 3,
            'viaje_id' => 2,
            'estado' => 0,
            'asiento_reservado' => '15'
        ]);
        
    }
}
