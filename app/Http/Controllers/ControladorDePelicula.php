<?php

namespace App\Http\Controllers;

use App\Pelicula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ControladorDePelicula extends Controller
{

    public function devolverFormularioNuevaPelicula(Request $request){
    	if(self::estaLogueado($request)){
            if(self::esAdministrador($request)){
                return view('registrarPelicula');        
            }
            else{
                //ERROR no es admin
                return view('noEsAdministrador');
            }
        }
        else{
            //redireccionar a login
            return redirect()->route('iniciarSesion');
        }
        
    }


    public function guardarNuevaPelicula(){
    	$data = request()->all();
    	Pelicula::create([
    		'nombre' => $data['nombre'],
    		'duracion' => $data['duracion'],
    		'sinopsis' => $data['sinopsis'],
    		'actores' => $data['actores'],
    		'fecha_de_estreno' => $data['fecha_de_estreno'],
    		'id_audio' => $data['id_audio'],
    		'id_subtitulos' => $data['id_subtitulos']

    	]);
        return redirect()->route('registrarPelicula');
    }

    public function cargarPaginaDeInicioConTodasLasPeliculas(){
        $hoy=new\ DateTime();
        $hoy = date_format($hoy, 'Y-m-d');
        $peliculas = DB::select('select * from peliculas where fecha_de_estreno < ?',[$hoy]);
        return view('paginaDeInicio', compact('peliculas'));
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
