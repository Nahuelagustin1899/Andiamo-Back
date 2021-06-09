<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Asiento;
use App\Models\Viaje;
use App\Models\Reserva;
use Carbon\Carbon;

class CambiarEstado extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cambiar:estado';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tenes 24 hs para pagar tu reserva';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {      
        $now = Carbon::now()->subDay(1);
        
       
        foreach (Reserva::all() as $asiento) {
            if($asiento->estado == 0){
            $date = new Carbon($asiento->created_at);
            
           if(($date->greaterThan($now))){
            $asiento->estado = 1; 
            $asiento->save();
           }

           }

        } 

    }
}
