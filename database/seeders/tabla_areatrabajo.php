<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tabla_areatrabajo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areatrabajo')->insert([
            'nombre' => 'L304', 
            'status' => '1',
        ]);

        DB::table('areatrabajo')->insert([
            'nombre' => 'L307', 
            'status' => '1',
        ]);

        DB::table('areatrabajo')->insert([
            'nombre' => 'L317', 
            'status' => '1',
        ]);

        DB::table('areatrabajo')->insert([
            'nombre' => 'L327', 
            'status' => '1',
        ]);

        DB::table('areatrabajo')->insert([
            'nombre' => 'L337', 
            'status' => '1',
        ]);
    }
}
