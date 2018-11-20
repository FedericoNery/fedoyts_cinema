<!doctype html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport"
			content="width= device-width, user-scalable=no,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
			<meta http-equiv="X-UA-COMPATIBLE" content="ie=edge">
			<link rel="shortcut icon" type="image/png" href="img/popcorn.png"/>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  			<link rel="stylesheet" href="css/estilos/proximosEstrenos.css">
			<title>PROXIMOS ESTRENOS</title>
		</head>

		<body>
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


			<h1 class="titulos">PROXIMOS ESTRENOS</h1>

			<table>
			@foreach ($peliculas as $pelicula)
				<tr>
				<td><img class="ubicacionImagen" src="img/{{$pelicula->nombre}}.jpg" alt="img/{{$pelicula->nombre}}" 
    			style="width:470px;height:600px;">
    			</td>
    			<td>
				 <h1 class="infoPelicula">{{$pelicula->nombre}}</h1>
				 <h5 class="infoPelicula">Duracion: {{$pelicula->duracion}}</h5>
				 <p class="infoPelicula">Sinopsis:{{$pelicula->sinopsis}}</p>
				 <h4 class="infoPelicula">Actores: {{$pelicula->actores}}</h4>
				 <p class="infoPelicula">Fecha de Estreno: {{$pelicula->fecha_de_estreno}}</p>
				 </td>
				 </tr>
			@endforeach
			</table>
		</body>
		</html>