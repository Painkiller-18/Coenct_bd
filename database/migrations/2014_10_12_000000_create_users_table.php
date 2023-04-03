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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('app');
            $table->string('apm');
            $table->string('nempleado')->unique();
            $table->string('email')->unique();
            $table->foreignId('id_departamento')->references('id')->on('departamento');
            $table->foreignId('id_puesto')->references('id')->on('puesto');
            $table->foreignId('id_nivelacceso')->references('id')->on('nivelacceso');
            $table->foreignId('id_areatrabajo')->references('id')->on('areatrabajo');
            $table->integer('status');
            $table->string('password');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
