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
        Schema::create('calendario', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_operacion')->references('id')->on('operaciones');
            $table->string('nombre');
            $table->string('codigo_alm');
            $table->string('codigo_sap');
            $table->string('pieza_ok');
            $table->string('pieza_nok');
            $table->string('vida_util')->nullable();
            $table->foreignId('id_ayuda_visual')->references('id')->on('ayudasvisuales');
            $table->foreignId('id_kaizen')->references('id')->on('kaizen');
            $table->integer('status');
            $table->integer('stock')->nullable();
            $table->integer('maximo')->nullable();
            $table->integer('minimo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calendario');
    }
};
