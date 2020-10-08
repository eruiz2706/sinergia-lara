<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pais;
use App\Models\Departamento;
use App\Models\Ciudad;
use DB;

class MaestroController extends Controller
{
    /*
    * Se obtiene el listado de usuarios registrados en la base de datos, este listado se retorna paginado y 
    * se puede filtrar por el paso,departamento y ciudad del usuario
    */
    public function getUsuarios(Request $request){

        $where = [];
        if($request->pais != ''){
            $where['usuarios.pais_id'] = $request->pais;
        }
        if($request->departamento != ''){
            $where['ciudades.departamento_id'] = $request->departamento;
        }
        if($request->ciudad != ''){
            $where['usuarios.ciudad_id'] = $request->ciudad;
        }

        $usuarios  = DB::table('usuarios')
        ->join('paises', 'usuarios.pais_id', '=', 'paises.id')
        ->join('ciudades', 'usuarios.ciudad_id', '=', 'ciudades.id')
        ->join('departamentos', 'ciudades.departamento_id', '=', 'departamentos.id')
        ->where($where)
        ->select('usuarios.nombre','paises.nombre as pais','ciudades.nombre as ciudad','departamentos.nombre as departamento')
        ->paginate(2);

        return response()->json([
            "usuarios" => $usuarios,
            "data" =>  $request->ciudad  
        ],200);
    }

    /*
    * Se obtiene el listado de todos los paises que estan en la base de datos
    */
    public function getPaises(Request $request){
        return response()->json([
            "paises" => Pais::all()
        ],200);
    }

    /*
    * Se obtiene el listado de todos los departamentos que estan en la base de datos
    */
    public function getDepartamentos(Request $request){
        return response()->json([
            "departamentos" => Departamento::all()
        ],200);
    }

    /*
    * Se obtiene el listado de todas las ciudades que estan en la base de datos
    */
    public function getCiudades(Request $request){

        $where = [];
        if($request->departamento != ''){
            $where['departamento_id'] = $request->departamento;
        }

        $ciudades = Ciudad::where($where)->get();

        return response()->json([
            "ciudades" => $ciudades
        ],200);
    }
}
