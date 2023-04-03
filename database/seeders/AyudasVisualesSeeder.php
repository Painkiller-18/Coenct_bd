<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AyudasVisualesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ayudasvisuales')->insert([
            'nombre' => 'Ejemplo_1',
            'pieza' => 'Motor',
            'documento' => 'Cronograma.pdf',
            'fecha_creacion' => '2023-02-05',
            'fecha_actualizacion' => '2023-03-20',
            'status' => '1',
        ]);

        DB::table('ayudasvisuales')->insert([
            'nombre' => 'Ejemplo_2',
            'pieza' => 'Motor',
            'documento' => 'Cronograma.pdf',
            'fecha_creacion' => '2023-02-05',
            'fecha_actualizacion' => '2023-03-12',
            'status' => '1',
        ]);

        DB::table('ayudasvisuales')->insert([
            'nombre' => 'Ejemplo_3',
            'pieza' => 'Motor',
            'documento' => 'Cronograma.pdf',
            'fecha_creacion' => '2023-02-05',
            'fecha_actualizacion' => '2023-03-10',
            'status' => '1',
        ]);

        DB::table('ayudasvisuales')->insert([
            'nombre' => 'Ejemplo_4',
            'pieza' => 'Motor',
            'documento' => 'Cronograma.pdf',
            'fecha_creacion' => '2023-02-05',
            'fecha_actualizacion' => '2023-03-09',
            'status' => '1',
        ]);
        DB::table('ayudasvisuales')->insert([
            'nombre' => 'Ejemplo_5',
            'pieza' => 'Motor',
            'documento' => 'Cronograma.pdf',
            'fecha_creacion' => '2023-02-05',
            'fecha_actualizacion' => '2023-03-13',
            'status' => '1',
        ]);
    }
}
