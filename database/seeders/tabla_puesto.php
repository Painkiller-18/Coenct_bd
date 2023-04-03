<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tabla_puesto extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('puesto')->insert([
            'nombre' => 'Supervisor', 
            'status' => '1',
        ]);

        DB::table('puesto')->insert([
            'nombre' => 'Ingeniero de Procesos', 
            'status' => '1',
        ]);

        DB::table('puesto')->insert([
            'nombre' => 'Team Leader', 
            'status' => '1',
        ]);

        DB::table('puesto')->insert([
            'nombre' => 'Ajustador', 
            'status' => '1',
        ]);
    }
}
