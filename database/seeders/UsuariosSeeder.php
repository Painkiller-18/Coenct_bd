<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Oscar Ruben',
            'app'=>'Roca',
            'apm'=>'Aguilar',
            'nempleado'=>'1234',
            'email'=>'oscar.roca@amats.com.mx',
            'id_departamento'=>'1',
            'id_puesto'=>'1',
            'id_nivelacceso'=>'1',
            'id_areatrabajo'=>'1',
            'status'=>'1',
            'password'=> bcrypt('12345678'),
            'remember_token'=>'NULL'
        ]);
        DB::table('users')->insert([
            'name'=>'Javier',
            'app'=>'Martínez',
            'apm'=>'Becerril',
            'nempleado'=>'12345',
            'email'=>'568254@gmail.com',
            'id_departamento'=>'1',
            'id_puesto'=>'1',
            'id_nivelacceso'=>'1',
            'id_areatrabajo'=>'1',
            'status'=>'1',
            'password'=> bcrypt('Javier1725'),
            'remember_token'=>'NULL'
        ]);
        DB::table('users')->insert([
            'name'=>'Eduardo',
            'app'=>'De la Cruz',
            'apm'=>'Rayón',
            'nempleado'=>'6728',
            'email'=>'al22@gmail.com',
            'id_departamento'=>'1',
            'id_puesto'=>'1',
            'id_nivelacceso'=>'3',
            'id_areatrabajo'=>'1',
            'status'=>'1',
            'password'=> bcrypt('Javier1725'),
            'remember_token'=>'NULL'
        ]);
        DB::table('users')->insert([
            'name'=>'Ricardo Isay',
            'app'=>'Portilla',
            'apm'=>'Torres',
            'nempleado'=>'6789',
            'email'=>'al221810675@gmail.com',
            'id_departamento'=>'1',
            'id_puesto'=>'1',
            'id_nivelacceso'=>'2',
            'id_areatrabajo'=>'1',
            'status'=>'1',
            'password'=> bcrypt('Javier1725'),
            'remember_token'=>'NULL'
        ]);
    }
}
