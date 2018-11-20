<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class ControladorDelAdministrador extends Controller
{
    public function dashboardAdmin(){
    	return view('admin');
    }

   	public function verRecaudacion(Request $request){
         if(self::estaLogueado($request)){
            if(self::esAdministrador($request)){
               $recaudaciones = DB::select("SELECT DATE_FORMAT(reservas.dia_hora, '%Y-%m-%d') AS Dia,COUNT(DATE_FORMAT(reservas.dia_hora, '%Y-%m-%d')) AS 'Entradas_Vendidas', SUM(salas.precio) AS Total from reservas INNER JOIN salas ON reservas.id_sala_reserva = salas.id_sala GROUP BY DATE_FORMAT(reservas.dia_hora, '%Y-%m-%d')");
         //dd($recaudaciones);
         return view('recaudacion',compact('recaudaciones'));
            }
            else{
               //ERROR no es admin
                return view('noEsAdministrador');
            }
         }
         else{
            //Redireccionar login
            return redirect()->route('iniciarSesion');
         }
   		
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
