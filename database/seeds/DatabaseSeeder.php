<?php

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
        $this->call(PaisSeeder::class);
        $this->call(DepartamentosSeeder::class);
        $this->call(CiudadesSeeder::class);
        $this->call(UsuariosSeeder::class);
    }
}
