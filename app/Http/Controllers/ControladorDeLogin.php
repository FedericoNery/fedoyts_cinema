<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Usuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class ControladorDeLogin extends Controller
{
	protected $guard = 'usuarios';

	public function mostrarFormularioDeLogin(){
		return view('login');
	}

    public function login(Request $request){
		$credentials = $this->validate(request(),[
			'email' =>'email|required|string',
			'contrasenia' => 'required|string'
		]);
		$email = $credentials['email'];
		$contrasenia = $credentials['contrasenia'];
		$usuario = DB::select('select * from usuarios where email=?',[$email]);
		$usuario = $usuario[0];
		if(!empty($usuario)){
			if (Hash::check($contrasenia, $usuario->contrasenia))	
			{
    			//dd($usuario);
    			$request->session()->put('id_usuario', $usuario->id_usuario);
    			$request->session()->put('nombre', $usuario->nombre);
    			$request->session()->put('apellido', $usuario->apellido);
    			$request->session()->put('email', $usuario->email);
    			$request->session()->put('telefono', $usuario->telefono);
    			$request->session()->put('fecha_de_nacimiento', $usuario->fecha_de_nacimiento);
    			$request->session()->put('contrasenia',$contrasenia);
    			$request->session()->put('esAdmin',$usuario->esAdmin);
    			//$data = $request->session()->all();//obtengo los datos de la sesion
    			//dd($data);
				$id = $usuario->id_usuario;


				if($usuario->esAdmin == 1){
					$usuario = $request->session()->all(); 
					return view('mostrarAdmin',compact('usuario'));
				}
				else{
					$usuario = $request->session()->all(); 
					return view('mostrarUsuario',compact('usuario'));	
				}
			}
			else{
				return back()->withErrors(['email' => 'Estas credenciales no coinciden con nuestros registros','contrasenia' => 'No coincide'])
		->withInput(request(['email']));
			}
		}
		else{
			return back()->withErrors(['email' => 'Estas credenciales no coinciden con nuestros registros','contrasenia' => 'No coincide'])
		->withInput(request(['email']));
		}
	}

	public function logout(){
		Auth::logout();
		return redirect('/');
	}

}
