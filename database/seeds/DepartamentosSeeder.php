<?php

use Illuminate\Database\Seeder;
use App\Models\Departamento;

class DepartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departamento::create([
            'codigo' => 76,
            'nombre' => 'Valle del cauca'
        ]);

        Departamento::create([
            'codigo' => 70,
            'nombre' => 'Sucre'
        ]);
    }
}
