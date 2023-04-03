<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CambiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cambios')->insert([
         'id_calendario' => '1',
         'id_usuario' => '1',
         'status' => 'Pendiente',
         'fecha' => DB::raw('SYSDATETIME()'),
         'comentarios' => NULL,
         'actualizado' => NULL,
        ]);
        DB::table('cambios')->insert([
         'id_calendario' => '2',
         'id_usuario' => '2',
         'status' => 'Pendiente',
         'fecha' => DB::raw('SYSDATETIME()'),
         'comentarios' => NULL,
         'actualizado' => NULL,
        ]);
        DB::table('cambios')->insert([
         'id_calendario' => '3',
         'id_usuario' => '1',
         'status' => 'Pendiente',
         'fecha' => DB::raw('SYSDATETIME()'),
         'comentarios' => NULL,
         'actualizado' => NULL,
        ]);
       
    }
}
