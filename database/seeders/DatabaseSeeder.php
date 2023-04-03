<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\operaciones;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(tabla_areatrabajo::class);
        $this->call(tabla_departamento::class);
        $this->call(tabla_nivelacceso::class);
        $this->call(tabla_puesto::class);
        $this->call(AyudasVisualesSeeder::class);
        $this->call(table_kaizen::class);
        $this->call(OperacionesSeeder::class);
        $this->call(CalendarioSeeder::class);
        $this->call(UsuariosSeeder::class);
        $this->call(CambiosSeeder::class);
    }
}
