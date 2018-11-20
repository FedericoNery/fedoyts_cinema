<?php

namespace App\Http\Controllers;

use App\Sala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ControladorDeSala extends Controller
{
    public function devolverFormularioNuevaSala(Request $request){
    	if(self::estaLogueado($request)){
            if(self::esAdministrador($request)){
                return view('nuevaSala');
            }
            else{
                //Error no es administrador
                return view('noEsAdministrador');
            }
        }
        else{
            //Redireccionar a login
            return redirect()->route('iniciarSesion');
        }
        
    }


    public function guardarNuevaSala(){
    	$data = request()->all();
    	Sala::create([
    		'cantidad_butacas' => $data['cantidad_butacas'],
    		'precio' => $data['precio']
    	]);
        return redirect()->route('nuevaSala');
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
