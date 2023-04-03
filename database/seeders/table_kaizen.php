<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class table_kaizen extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kaizen')->insert([
            'nombre' => 'kaizen_1',
            'documento' => 'Doc_1',
            'fecha_creacion' => '2023-02-05',
            'status' => '1',
        ]);

        DB::table('kaizen')->insert([
            'nombre' => 'kaizen_2',
            'documento' => 'Doc_1',
            'fecha_creacion' => '2023-02-05',
            'status' => '1',
        ]);

        DB::table('kaizen')->insert([
            'nombre' => 'kaizen_3',
            'documento' => 'Doc_1',
            'fecha_creacion' => '2023-02-05',
            'status' => '1',
        ]);

        DB::table('kaizen')->insert([
            'nombre' => 'kaizen_4',
            'documento' => 'Doc_1',
            'fecha_creacion' => '2023-02-05',
            'status' => '1',
        ]);
        DB::table('kaizen')->insert([
            'nombre' => 'kaizen_5',
            'documento' => 'Doc_5',
            'fecha_creacion' => '2023-02-05',
            'status' => '1',
        ]);
    }
}
