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
        Schema::create('cambios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_calendario')->references('id')->on('calendario');
            $table->foreignId('id_usuario')->nullable()->constrained()->references('id')->on('users');
            $table->string('status', 30);
            $table->date('fecha');
            $table->text('comentarios')->nullable();
            $table->dateTime('actualizado')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cambios');
    }
};