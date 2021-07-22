<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       

        Schema::create('viajes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('empresa_id');
            $table->foreign( 'empresa_id' )->references( 'id' )->on( 'empresas' )->onDelete('cascade');
            $table->unsignedBigInteger('salida_id');
            $table->foreign( 'salida_id' )->references( 'id' )->on( 'estacions' );
            $table->unsignedBigInteger('destino_id');
            $table->foreign( 'destino_id' )->references( 'id' )->on( 'estacions' );
            $table->timestamp('fecha_salida')->nullable();
            $table->timestamp('fecha_llegada')->nullable();
            $table->integer('cantidad_asientos');
            $table->decimal('precio', 10, 2);
            $table->timestamps();
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('viajes');
    }
}
