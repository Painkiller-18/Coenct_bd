<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CalendarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('calendario')->insert([
            'id_operacion'=>'1',
            'nombre'=>'Embolo / Nucleo de coraza',
            'codigo_alm'=>'A23',
            'codigo_sap'=>'S23',
            'pieza_ok'=>'capibara_1679587850.jpg',
            'pieza_nok'=>'capibara_1679587850.jpg',
            'vida_util'=>'12',
            'id_ayuda_visual'=>'1',
            'id_kaizen'=>'1',
            'status'=>'1',
            'stock'=>'2',
            'maximo'=>'3',
            'minimo'=>'2'
        ]);
        DB::table('calendario')->insert([
            'id_operacion'=>'1',
            'nombre'=>'Pernos de eje lineal / Calza de núcleo de grabadora',
            'codigo_alm'=>'A23',
            'codigo_sap'=>'S23',
            'pieza_ok'=>'fondo_1679587273.jpg',
            'pieza_nok'=>'Pantalla_bloqueo_1679410830.jpg',
            'vida_util'=>'-1',
            'id_ayuda_visual'=>'2',
            'id_kaizen'=>'2',
            'status'=>'1',
            'stock'=>'2',
            'maximo'=>'3',
            'minimo'=>'2'
        ]);
        DB::table('calendario')->insert([
            'id_operacion'=>'1',
            'nombre'=>'Pizador cobre',
            'codigo_alm'=>'A23',
            'codigo_sap'=>'S23',
            'pieza_ok'=>'Pantalla_bloqueo_1679410830.jpg',
            'pieza_nok'=>'Pantalla_bloqueo_1679410830.jpg',
            'vida_util'=>'12',
            'id_ayuda_visual'=>'3',
            'id_kaizen'=>'3',
            'status'=>'1',
            'stock'=>'1',
            'maximo'=>'5',
            'minimo'=>'3'
        ]);
        DB::table('calendario')->insert([
            'id_operacion'=>'1',
            'nombre'=>'Base de giro de coraza',
            'codigo_alm'=>'A23',
            'codigo_sap'=>'S23',
            'pieza_ok'=>'capibara_1679587850.jpg',
            'pieza_nok'=>'capibara_1679587850.jpg',
            'vida_util'=>'6',
            'id_ayuda_visual'=>'4',
            'id_kaizen'=>'4',
            'status'=>'1',
            'stock'=>'1',
            'maximo'=>'1',
            'minimo'=>'1'
        ]);
        DB::table('calendario')->insert([
            'id_operacion'=>'1',
            'nombre'=>'Placa del poka yoke',
            'codigo_alm'=>'A23',
            'codigo_sap'=>'S23',
            'pieza_ok'=>'fondo_1679587273.jpg',
            'pieza_nok'=>'Pantalla_bloqueo_1679410830.jpg',
            'vida_util'=>'3',
            'id_ayuda_visual'=>'5',
            'id_kaizen'=>'5',
            'status'=>'1',
            'stock'=>'3',
            'maximo'=>'6',
            'minimo'=>'2'
        ]);
        DB::table('calendario')->insert([
            'id_operacion'=>'2',
            'nombre'=>'Mordaza derecha',
            'codigo_alm'=>'A23',
            'codigo_sap'=>'S23',
            'pieza_ok'=>'capibara_1679587850.jpg',
            'pieza_nok'=>'capibara_1679587850.jpg',
            'vida_util'=>'6',
            'id_ayuda_visual'=>'4',
            'id_kaizen'=>'4',
            'status'=>'1',
            'stock'=>'1',
            'maximo'=>'1',
            'minimo'=>'1'
        ]);
        DB::table('calendario')->insert([
            'id_operacion'=>'2',
            'nombre'=>'Mordaza izquierda',
            'codigo_alm'=>'A23',
            'codigo_sap'=>'S23',
            'pieza_ok'=>'fondo_1679587273.jpg',
            'pieza_nok'=>'Pantalla_bloqueo_1679410830.jpg',
            'vida_util'=>'3',
            'id_ayuda_visual'=>'5',
            'id_kaizen'=>'5',
            'status'=>'1',
            'stock'=>'3',
            'maximo'=>'6',
            'minimo'=>'2'
        ]);
        
        DB::table('calendario')->insert([
            'id_operacion'=>'3',
            'nombre'=>'Embolo / Pizador de coraza',
            'codigo_alm'=>'A23',
            'codigo_sap'=>'S23',
            'pieza_ok'=>'fondo_1679587273.jpg',
            'pieza_nok'=>'Pantalla_bloqueo_1679410830.jpg',
            'vida_util'=>'-1',
            'id_ayuda_visual'=>'2',
            'id_kaizen'=>'2',
            'status'=>'1',
            'stock'=>'2',
            'maximo'=>'3',
            'minimo'=>'2'
        ]);
        DB::table('calendario')->insert([
            'id_operacion'=>'3',
            'nombre'=>'Guía derecha',
            'codigo_alm'=>'A23',
            'codigo_sap'=>'S23',
            'pieza_ok'=>'Pantalla_bloqueo_1679410830.jpg',
            'pieza_nok'=>'Pantalla_bloqueo_1679410830.jpg',
            'vida_util'=>'12',
            'id_ayuda_visual'=>'3',
            'id_kaizen'=>'3',
            'status'=>'1',
            'stock'=>'1',
            'maximo'=>'5',
            'minimo'=>'3'
        ]);
        DB::table('calendario')->insert([
            'id_operacion'=>'3',
            'nombre'=>'Guía izquierda',
            'codigo_alm'=>'A23',
            'codigo_sap'=>'S23',
            'pieza_ok'=>'capibara_1679587850.jpg',
            'pieza_nok'=>'capibara_1679587850.jpg',
            'vida_util'=>'6',
            'id_ayuda_visual'=>'4',
            'id_kaizen'=>'4',
            'status'=>'1',
            'stock'=>'1',
            'maximo'=>'1',
            'minimo'=>'1'
        ]);
        DB::table('calendario')->insert([
            'id_operacion'=>'3',
            'nombre'=>'Soporte de imán frontal / Guía de muelle en z',
            'codigo_alm'=>'A23',
            'codigo_sap'=>'S23',
            'pieza_ok'=>'fondo_1679587273.jpg',
            'pieza_nok'=>'Pantalla_bloqueo_1679410830.jpg',
            'vida_util'=>'3',
            'id_ayuda_visual'=>'5',
            'id_kaizen'=>'5',
            'status'=>'1',
            'stock'=>'3',
            'maximo'=>'6',
            'minimo'=>'2'
        ]);
        DB::table('calendario')->insert([
            'id_operacion'=>'3',
            'nombre'=>'Soporte de imán tracero / Guía de muelle en L',
            'codigo_alm'=>'A23',
            'codigo_sap'=>'S23',
            'pieza_ok'=>'capibara_1679587850.jpg',
            'pieza_nok'=>'capibara_1679587850.jpg',
            'vida_util'=>'6',
            'id_ayuda_visual'=>'4',
            'id_kaizen'=>'4',
            'status'=>'1',
            'stock'=>'1',
            'maximo'=>'1',
            'minimo'=>'1'
        ]);
        DB::table('calendario')->insert([
            'id_operacion'=>'3',
            'nombre'=>'Insertos de Bimanuales Ens. Imanes',
            'codigo_alm'=>'A23',
            'codigo_sap'=>'S23',
            'pieza_ok'=>'fondo_1679587273.jpg',
            'pieza_nok'=>'Pantalla_bloqueo_1679410830.jpg',
            'vida_util'=>'3',
            'id_ayuda_visual'=>'5',
            'id_kaizen'=>'5',
            'status'=>'1',
            'stock'=>'3',
            'maximo'=>'6',
            'minimo'=>'2'
        ]);
    }
}
