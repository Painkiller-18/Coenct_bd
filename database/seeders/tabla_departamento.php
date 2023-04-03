<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tabla_departamento extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departamento')->insert([
            'nombre' => 'AHC', 
            'status' => '1',
        ]);
        
        DB::table('departamento')->insert([
            'nombre' => 'ABS', 
            'status' => '1',
        ]);

        DB::table('departamento')->insert([
            'nombre' => 'WPS', 
            'status' => '1',
        ]);
    }
}
