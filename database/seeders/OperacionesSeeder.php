<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OperacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('operaciones')->insert([
            'nombre'=>'1010 Grabado de coraza'
        ]);
        DB::table('operaciones')->insert([
            'nombre'=>'1020 Colocación de coraza en carro transportador'
        ]);
        DB::table('operaciones')->insert([
            'nombre'=>'1030 Ensamble imanes y muelles'
        ]);
        DB::table('operaciones')->insert([
            'nombre'=>'1040 Estación de prelimpieza de coraza'
        ]);
        DB::table('operaciones')->insert([
            'nombre'=>'1050 Ensamble arandela de fricción'
        ]);
    }
}
