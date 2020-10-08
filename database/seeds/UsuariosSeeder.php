<?php

use Illuminate\Database\Seeder;
use App\Models\Pais;
use App\Models\Ciudad;
use App\Models\Usuario;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $paisColombia = Pais::where('codigo','CO')->first();

        Usuario::create([
            'nombre' => 'Eduardo ruiz',
            'pais_id' => $paisColombia->id,
            'ciudad_id' => Ciudad::where('codigo',76001)->first()->id
        ]);

        
        Usuario::create([
            'nombre' => 'Jhoana ortiz',
            'pais_id' => $paisColombia->id,
            'ciudad_id' => Ciudad::where('codigo',70001)->first()->id
        ]);

        Usuario::create([
            'nombre' => 'Tatiana rua',
            'pais_id' => $paisColombia->id,
            'ciudad_id' => Ciudad::where('codigo',76036)->first()->id
        ]);

        Usuario::create([
            'nombre' => 'Carlos montenegro',
            'pais_id' => $paisColombia->id,
            'ciudad_id' => Ciudad::where('codigo',70204)->first()->id
        ]);

        Usuario::create([
            'nombre' => 'Luis ponce',
            'pais_id' => $paisColombia->id,
            'ciudad_id' => Ciudad::where('codigo',76001)->first()->id
        ]);

        
        Usuario::create([
            'nombre' => 'Marcela caicedo',
            'pais_id' => $paisColombia->id,
            'ciudad_id' => Ciudad::where('codigo',70001)->first()->id
        ]);

        Usuario::create([
            'nombre' => 'Duber correa',
            'pais_id' => $paisColombia->id,
            'ciudad_id' => Ciudad::where('codigo',76036)->first()->id
        ]);

        Usuario::create([
            'nombre' => 'Mauricio bustamante',
            'pais_id' => $paisColombia->id,
            'ciudad_id' => Ciudad::where('codigo',70204)->first()->id
        ]);
    }
}
