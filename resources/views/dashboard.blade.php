@extends('layouts.app')

@section('usuarios')
@section('content')
	<div class="container">
		<nav class="navbar fixed-top navbar-expand-sm bg-dark navbar-dark">
				<!-- Brand/logo style="width:100%; height: 10%;" -->
  				<a class="navbar-brand" href="#">
    				<img src="img/logofedoyts.png" alt="logo" style="width:200px;" >
  				</a>
			  
			  <ul class="navbar-nav mr-auto">
			    <li class="nav-item active">
			      <a class="nav-link" href="{{route('paginaDeInicio')}}">Inicio</a>
			    </li>
			    <li class="nav-item">
			      <a class="nav-link" href="{{route('verProximosEstrenos')}}">Ver Estrenos</a>
			    </li>
			    
			  </ul>
			  <ul class="navbar-nav">
			      <li class="nav-item">
			        <a class="nav-link" href="{{route('iniciarSesion')}}">Iniciar Sesion</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="{{route('nuevoUsuario')}}">Registrarse</a>
			      </li>
			    </ul>
			</nav>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
			<div class="panel panel-default">
				@if($usuario)
					<div class="panel-heading">		
						<h1 class="panel-title">Bienvenido {{$usuario['nombre']}} {{$usuario['apellido']}}</h1>
					</div>
				@endif		
				<a href="{{route('paginaDeInicio')}}">Ver peliculas disponibles</a> <br>
				<a href="{{route('mostrarFormularioModificar')}}">Modificar Usuario</a> <br>
				<a href="{{route('verMisReservas')}}">Mis Reservas</a> <br>
				<div class="panel-footer">
					<form method="POST" action="{{ route('logout') }}">
						{{ csrf_field() }}
						<br>
						<button class="btn btn-danger btn-xs btn-block"> Cerrar sesión</button>
					</form>
				</div>
			</div>
	</div>
@endsection
