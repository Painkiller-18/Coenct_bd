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
        Schema::create('kaizen', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->string('documento');
            $table->date('fecha_creacion');
            $table->date('fecha_actualizacion')->default(DB::raw('SYSDATETIME()'));
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
        Schema::dropIfExists('kaizen');
    }
};
