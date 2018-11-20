<?php

namespace App\Http\Controllers;

use App\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use JavaScript;
use Barryvdh\DomPDF\Facade as PDF;

class ControladorDeReserva extends Controller
{
   public function devolverFormularioNuevaReserva(Request $request,$idPelicula){
        $datosDeLaSesion = request()->session()->all();
            
        if (!empty($datosDeLaSesion)) {
               
            date_default_timezone_set('America/Argentina/Buenos_Aires');
        $fechaDeHoy = date('Y-m-d');
        $salasDondeSeProyectaLaPelicula = DB::select('select id_sala from salas_peliculas where id_pelicula = ? AND hasta >= ?',[$idPelicula,$fechaDeHoy]);

        $cantidadDeButacas = DB::select('select cantidad_butacas from salas where id_sala = ?',[1]);
        //dd($salasDondeSeProyectaLaPelicula);
        $cantidadDeButacas = $cantidadDeButacas[0];
        //dd($cantidadDeButacas);
        $infoSalas = DB::select('select * from salas INNER JOIN salas_peliculas 
            ON salas.id_sala = salas_peliculas.id_sala
            WHERE salas_peliculas.id_pelicula = ? AND salas_peliculas.hasta >= ?',[$idPelicula,$fechaDeHoy]);
        //JavaScript::put($infoSalas);
        $peliculaSeleccionada = $idPelicula;
        return view('nuevaReserva', compact('cantidadDeButacas','salasDondeSeProyectaLaPelicula','infoSalas','peliculaSeleccionada'));    
        }
        else{
           return redirect()->route('iniciarSesion');
            
        }
        
    }

    public function mostrarConfirmarReserva(Request $request){
        $datosDeLaSesion = $request->session()->all();
        $datosDelFormularioDeReserva = request()->all();
        $request->session()->put('datosDeLaReserva',$datosDelFormularioDeReserva);
        $request->session()->put('datosDeLaReservaParaPDF',$datosDelFormularioDeReserva);

        $nombrePelicula = DB::select('select peliculas.nombre from peliculas where id_pelicula =?',[$datosDelFormularioDeReserva['idPeliculaParaVer']]);
        $nombrePelicula = $nombrePelicula[0];

        $request->session()->put('nombrePelicula',$nombrePelicula);
        
        return view('confirmarReserva',compact('datosDeLaSesion','datosDelFormularioDeReserva','nombrePelicula','precioDeLaEntrada'));
    }

    public function guardarNuevaReserva(Request $request){
    	$datosDeLaReserva = $request->session()->get('datosDeLaReservaParaPDF');
        $datosDeLaSesion = $request->session()->all();


        $id_sala_reserva = $datosDeLaReserva['Salas_disponibles']; 
        $id_usuario_reserva = $datosDeLaSesion['id_usuario'];
        $dia_hora = $datosDeLaReserva['Fechas_y_Horarios_disponibles'];

                
        $cantidadButacasReservadas = count($datosDeLaReserva['butacasSeleccionadas']);
        


        for($j = 0; $j < $cantidadButacasReservadas; $j++){
            $id_butaca = $datosDeLaReserva['butacasSeleccionadas'][$j];
           
            Reserva::create([
                'id_sala_reserva' => (int) $id_sala_reserva,
                'id_usuario_reserva' => $id_usuario_reserva,
                //'dia_hora' => date_create_from_format('Y-m-d-h', $dia_hora),
                'dia_hora' => $dia_hora,
                'id_butaca' => (int) $id_butaca
            ]);
        }
        $request->session()->forget('datosDeLaReserva');
        return view('reservaExitosa');
        
    }

    public function devolverFormularioDeSeleccionDePeliculasDisponibles()
    {
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        //$zonahoraria = date_default_timezone_get();
        $fechaDeHoy = date('Y-m-d');
        $peliculasDisponiblesParaVer = DB::select('select salas_peliculas.id_sala, salas_peliculas.id_pelicula, salas_peliculas.desde, salas_peliculas.hasta
            ,peliculas.nombre from salas_peliculas
        INNER JOIN peliculas ON salas_peliculas.id_pelicula = peliculas.id_pelicula where hasta >= ?',[$fechaDeHoy]);
        //dd($peliculasDisponiblesParaVer);

        return view('mostrarProyeccionesParaVer',compact('peliculasDisponiblesParaVer'));
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


    public function reservaAPDF(Request $request)
    {    
        $datosDeLaSesion = request()->session()->all();
        $datosDeLaReserva = $request->session()->get('datosDeLaReservaParaPDF');

        //dd($datosDeLaReserva);
        $pdf = PDF::loadView('reservaPDF', compact('datosDeLaSesion','datosDeLaReserva'));
        //$request->session()->forget('datosDeLaReservaParaPDF');
        return $pdf->download('reserva.pdf');
    }

}
