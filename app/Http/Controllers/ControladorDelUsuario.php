<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class ControladorDelUsuario extends Controller
{

    public function devolverFormularioNuevoUsuario(){
    	return view('nuevoUsuario');
    }

    public function devolverFormularioModificarUsuario(){
        if(self::estaLogueado($request)){
            return view('modificarUsuario');    
        }
        else{
            //redireccionar login
            return redirect()->route('iniciarSesion');
        }
    }

     public function mostrarFormularioModificarAdmin(Request $request){
         if(self::estaLogueado($request)){
            $datosDeLaSesion = $request->session()->all();
         return view ('modificarAdmin',compact('datosDeLaSesion'));   
         }
         else{
            //Redireccionar login
            return redirect()->route('iniciarSesion');
         }
    }

    public function guardarNuevoUsuario(Request $request){
        $codigoDeVerificacionAdmin = 'A1D3M2I7N';
    	$esAdmin = 0;
        $data = request()->all();
    	if($data['esAdmin'] === $codigoDeVerificacionAdmin){
            $esAdmin = 1;
        }
        Usuario::create([
    		'nombre' => $data['nombre'],
    		'apellido' => $data['apellido'],
    		'email' => $data['email'],
    		'telefono' => $data['telefono'],
    		'fecha_de_nacimiento' => $data['fecha_de_nacimiento'],
    		'contrasenia' => bcrypt($data['contrasenia']),
            'esAdmin' => $esAdmin
    	]);

        $id_usuario = DB::select('select id_usuario from usuarios where email = ?',[$data['email']]);
        $id_usuario = $id_usuario[0]->id_usuario;
        
        $request->session()->put('id_usuario', $id_usuario);
        $request->session()->put('nombre', $data['nombre']);
        $request->session()->put('apellido', $data['apellido']);
        $request->session()->put('email', $data['email']);
        $request->session()->put('telefono', $data['telefono']);
        $request->session()->put('fecha_de_nacimiento', $data['fecha_de_nacimiento']);
        $request->session()->put('contrasenia',$data['contrasenia']);
        $request->session()->put('esAdmin',$esAdmin);
        $datosDeLaSesion = $request->session()->all();
        
        if($esAdmin == 1){
            return redirect()->route('dashboardAdmin');
        }
        else{
            return redirect()->route('mostrarUsuario');    
        }
        
    }


    public function guardarModificacionUsuario(Request $request){
        $datosDeLaSesion = $request->session()->all();
        $idUsuario = $datosDeLaSesion['id_usuario'];
        
        $usuario = DB::select('select * from usuarios where id_usuario=?',[$idUsuario]);
        $usuario = $usuario[0];
        $data = request()->all();
        $dia = $data['fecha_de_nacimiento'];

        $cadenaParaActualizar = 'update usuarios set ';
        $cadenaParaActualizar = $cadenaParaActualizar.'nombre=';
        $cadenaParaActualizar =$cadenaParaActualizar .'"' .$data['nombre'] . '",';

        $cadenaParaActualizar = $cadenaParaActualizar . 'apellido=';
        $cadenaParaActualizar =$cadenaParaActualizar . '"' . $data['apellido'] . '",';

        $cadenaParaActualizar = $cadenaParaActualizar . 'email=';
        $cadenaParaActualizar =$cadenaParaActualizar . '"' . $data['email'] . '",';

        $cadenaParaActualizar = $cadenaParaActualizar . 'telefono=';
        $cadenaParaActualizar =$cadenaParaActualizar . '"' . $data['telefono'] . '",';

        $cadenaParaActualizar = $cadenaParaActualizar . 'fecha_de_nacimiento=';
        $cadenaParaActualizar =$cadenaParaActualizar .'"'. $data['fecha_de_nacimiento'] . '",';

         $cadenaParaActualizar = $cadenaParaActualizar . 'contrasenia=';
        $cadenaParaActualizar =$cadenaParaActualizar . '"' . bcrypt($data['contrasenia']) . '"';

        $cadenaParaActualizar = $cadenaParaActualizar . 'where id_usuario=?';
        
        DB::update($cadenaParaActualizar,[$idUsuario]);
        self::actualizarDatosDeLaSesion($request,$data);

        if($datosDeLaSesion['esAdmin'] == 0){
            return redirect()->route('mostrarFormularioModificar');    
        }
        else{
             return redirect()->route('mostrarFormularioModificarAdmin');    
        }
    }

    /*public function mostrar(){
        $usuarios = DB::select('select * from usuarios where id_usuario=?',[1]);
        return view('mostrarUsuario',['usuarios' => $usuarios]);
        
    }*/


    public function mostrarFormularioModificar(Request $request){
         if(self::estaLogueado($request)){
            $datosDeLaSesion = $request->session()->all();
         return view ('modificarUsuario',compact('datosDeLaSesion'));   
         }
         else{
            //Redireccionar login
            return redirect()->route('iniciarSesion');
         }
         
    }

    public function actualizarDatosDeLaSesion(Request $request, $dataAActualizar){
        $request->session()->forget('nombre');
        $request->session()->forget('apellido');
        $request->session()->forget('email');
        $request->session()->forget('telefono');
        $request->session()->forget('fecha_de_nacimiento');

                $request->session()->put('nombre', $dataAActualizar['nombre']);
                $request->session()->put('apellido', $dataAActualizar['apellido']);
                $request->session()->put('email', $dataAActualizar['email']);
                $request->session()->put('telefono', $dataAActualizar['telefono']);
                $request->session()->put('fecha_de_nacimiento', $dataAActualizar['fecha_de_nacimiento']);
                $request->session()->put('contrasenia',$dataAActualizar['contrasenia']);
        
    }

    public function verMisReservas(Request $request){
        $informacionDelUsuario = $request->session()->all();

        $id_usuario = $request->session()->get('id_usuario');
        $reservas = DB::select('select reservas.*,peliculas.nombre from reservas 
        inner join (peliculas inner join salas_peliculas on salas_peliculas.id_pelicula = peliculas.id_pelicula )on salas_peliculas.id_sala = reservas.id_sala_reserva
         where reservas.id_usuario_reserva = ?',[$id_usuario]);
        //dd($reservas);
        
        if($informacionDelUsuario['esAdmin']==0){
            return view('misReservas',compact('reservas','informacionDelUsuario'));    
        }
        else{
            return view('misReservasAdmin',compact('reservas','informacionDelUsuario'));    
        }
        
    }

  

    public function mostrarUsuario(Request $request){
        $usuario = $request->session()->all();
        return view('dashboard',compact('usuario'));
    }

    public function mostrarAdmin(Request $request){
        $usuario = $request->session()->all(); 
        return view('mostrarAdmin',compact('usuario'));
    }
    
   public function estaLogueado(Request $request){
        $datosDeLaSesion = request()->session()->all();
        if (!empty($datosDeLaSesion)) {
            return true;
        }
        return false;      
    }

  
}
