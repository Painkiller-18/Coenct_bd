<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tabla_nivelacceso extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nivelacceso')->insert([
            'nombre' => 'Administrador',
            'nivel' => '1', 
            'status' => '1', 
        ]);

        DB::table('nivelacceso')->insert([
            'nombre' => 'Subadministrador',
            'nivel' => '2', 
            'status' => '1',
        ]);

        DB::table('nivelacceso')->insert([
            'nombre' => 'Operador',
            'nivel' => '3', 
            'status' => '1',
        ]);
    }
}
