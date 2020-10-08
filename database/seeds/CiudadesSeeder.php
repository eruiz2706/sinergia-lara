<?php

use Illuminate\Database\Seeder;
use App\Models\Departamento;
use App\Models\Ciudad;

class CiudadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $departamentoValle = Departamento::where('codigo',76)->first();
        $departamentoSucre = Departamento::where('codigo',70)->first();

        Ciudad::create([
            'codigo' =>76001,
            'nombre' =>'Cali',
            'departamento_id' => $departamentoValle->id
        ]);

        Ciudad::create([
            'codigo' =>76036,
            'nombre' =>'Andalucia',
            'departamento_id' => $departamentoValle->id
        ]);

        Ciudad::create([
            'codigo' =>70001,
            'nombre' =>'Sincelejo',
            'departamento_id' => $departamentoSucre->id
        ]);

        Ciudad::create([
            'codigo' =>70204,
            'nombre' =>'Coloso',
            'departamento_id' => $departamentoSucre->id
        ]);

    }
}
