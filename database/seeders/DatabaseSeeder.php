<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();
        $this->call(EmpresasTableSeeder::class);
        $this->call(EstacionesTableSeeder::class);
        $this->call(ViajesTableSeeder::class);
        $this->call(UsuarioTableSeeder::class);
        $this->call(ReservasTableSeeder::class);
    }
}
