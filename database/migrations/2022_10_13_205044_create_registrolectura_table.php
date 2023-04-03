<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('registrolectura', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_users')->references('id')->on('users');
            $table->foreignId('id_ayudavisual')->references('id')->on('ayudasvisuales');
            $table->dateTime('fecha_enterado')->default(DB::raw('SYSDATETIME()'));
            $table->integer('status')->default(1);
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registrolectura');
    }
};
