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
        Schema::disableForeignKeyConstraints();

        Schema::create('viajes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('empresa_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('salida_id')->constrained('estacions')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('destino_id')->constrained('estacions')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamp('fecha_salida')->nullable();
            $table->timestamp('fecha_llegada')->nullable();
            $table->integer('cantidad_asientos');
            $table->decimal('precio', 10, 2);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
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
