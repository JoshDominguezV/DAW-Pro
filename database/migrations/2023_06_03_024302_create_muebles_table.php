<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mueble', function (Blueprint $table) {
            $table->increments('idMueble');
            $table->integer('idCategoria')->unsigned();
            $table->foreign('idCategoria')->references('idCategoria')->on('categoria');
            $table->integer('idMarca')->unsigned();
            $table->foreign('idMarca')->references('idMarca')->on('marca');
            $table->integer('idTipoMueble')->unsigned();
            $table->foreign('idTipoMueble')->references('idTipoMueble')->on('tipomueble');
            $table->float('precio', 4, 2);
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
        Schema::dropIfExists('mueble');
    }
};
