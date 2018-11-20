<!doctype html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport"
			content="width= device-width, user-scalable=no,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
			<meta http-equiv="X-UA-COMPATIBLE" content="ie=edge">
			<link rel="shortcut icon" type="image/png" href="../img/popcorn.png"/>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  			<link rel="stylesheet" href="../css/estilos/misReservas.css">
			<title>MIS RESERVAS</title>
		</head>

		<body>
			<nav class="navbar fixed-top navbar-expand-sm bg-dark navbar-dark">
				<!-- Brand/logo style="width:100%; height: 10%;" -->
  				<a class="navbar-brand" href="#">
    				<img src="../img/logofedoyts.png" alt="logo" style="width:200px;" >
  				</a>
			  
			  <ul class="navbar-nav mr-auto">
			    <li class="nav-item active">
			      <a class="nav-link" href="{{route('paginaDeInicio')}}">Inicio</a>
			    </li>
			    <li class="nav-item">
			      <a class="nav-link" href="{{route('verProximosEstrenos')}}">Ver Estrenos</a>
			    </li>
			    <li class="nav-item">
			      <a class="nav-link" href="{{route('mostrarAdmin')}}">Panel del Admin</a>
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

			<div class="container">
				<br>
			<br>
			<br>
			<br>
			<br>
			<h1 class="titulos">MIS RESERVAS</h1>
			<table class="table-bordered">
			<tr>
				<th>
					<p class="titulos">Fecha de reserva</p>
				</th>
				<th>
					<p class="titulos">Sala</p>
				</th>
				<th>
					<p class="titulos">Butaca</p>
				</th>
				<th>
					<p class="titulos">Pelicula</p>
				</th>
			</tr>
			@foreach($reservas as $reserva)
				<tr>
					<td>
						<p class="titulos">{{$reserva->dia_hora}}</p>
					</td>
					<td>
						<p class="titulos">{{$reserva->id_sala_reserva}}</p>
					</td>
					<td>
						<p class="titulos">{{$reserva->id_butaca}}</p>
					</td>
					<td>
						<p class="titulos">{{$reserva->nombre}}</p>
					</td>
				</tr>
			@endforeach
			</table>
			<br>
			<a  href="{{route('mostrarAdmin')}}">Volver al Dashboard del Admin</a> 
			</div>
		</body>
		</html>