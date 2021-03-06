<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        

        Schema::create('reservas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign( 'user_id' )->references( 'id' )->on( 'users' )->onDelete('cascade');
            $table->unsignedBigInteger('viaje_id');
            $table->foreign( 'viaje_id' )->references( 'id' )->on( 'viajes' )->onDelete('cascade');
            $table->boolean('estado')->default(false);
            $table->string('asiento_reservado');
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
        Schema::dropIfExists('reservas');
    }
}
