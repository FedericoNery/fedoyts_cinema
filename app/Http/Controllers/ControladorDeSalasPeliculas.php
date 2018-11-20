<?php

namespace App\Http\Controllers;

use App\SalaPelicula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ControladorDeSalasPeliculas extends Controller
{
  public function devolverFormularioNuevaProyeccion(Request $request){
    if(self::estaLogueado($request)){
        if(self::esAdministrador($request)){
            $listaDePeliculas = DB::select('select id_pelicula,nombre from peliculas');
            $listaDeSalas = DB::select('select id_sala from salas');
            return view('nuevaProyeccion', compact('listaDePeliculas', 'listaDeSalas'));
        }
        else{
            //redireccionar a pagina que diga NO ES ADMINISTRADOR Vuelva a su perfil
            return view('noEsAdministrador');
        }
    }
    else{
        //redireccionar a loguin
        return redirect()->route('iniciarSesion');
    }
        
    }

    public function guardarNuevaProyeccion(){

    	$data = request()->all();
    	SalaPelicula::create([
    		'id_sala' => $data['comboSalas'], //$_POST['comboSalas'];
    		'id_pelicula' => $data['comboPeliculas'],
    		'desde' => $data['desde'],
    		'hasta' => $data['hasta']
    	]);
        return redirect()->route('nuevaProyeccion');
    }


    public function cargarPaginaDeEstrenos(){
        $hoy=new\ DateTime();
        $hoy = date_format($hoy, 'Y-m-d');
        
        $peliculas = DB::select('select salas_peliculas.*,peliculas.* from salas_peliculas inner join peliculas on salas_peliculas.id_pelicula = peliculas.id_pelicula where salas_peliculas.desde > ?',[$hoy]);

        return view('proximosEstrenos',compact('peliculas'));   
    }

    public function esUsuario(Request $request){
        $datosDeLaSesion = request()->session()->all();
        $esUsuario = $request->session()->get('esAdmin');
        if($esUsuario == 0){
                //Que entre a la pagina
            return true;
        }
        return false;
            
    }

    public function esAdministrador(Request $request){
        $datosDeLaSesion = request()->session()->all();
        $esAdmin = $request->session()->get('esAdmin');
        if($esAdmin == 1){
                //Que entre a la pagina
            return true;
        }
        return false;
            
        
    }

    public function estaLogueado(Request $request){
        $datosDeLaSesion = request()->session()->all();
        if (!empty($datosDeLaSesion)) {
            return true;
        }
        return false;      
    }
}
