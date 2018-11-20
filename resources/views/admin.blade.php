<!doctype html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport"
			content="width= device-width, user-scalable=no,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
			<meta http-equiv="X-UA-COMPATIBLE" content="ie=edge">
			<link rel="shortcut icon" type="image/png" href="img/popcorn.png"/>
			<link href="css/bootstrap.min.css" rel="stylesheet">
			<title>ADMINISTRADOR</title>
			<link rel="stylesheet" href="css/estilos/iniciarSesion.css">
		</head>

		<body>
			<div class="container">
			<h1 class="titulos">ADMINISTRADOR</h1>
			<a  href="{{route('registrarPelicula')}}">Alta Pelicula</a> <br>
			<a  href="{{route('nuevaSala')}}">Alta Sala</a> <br>
			<a  href="{{route('nuevaProyeccion')}}">Proyectar pelicula</a> <br>
			<a href="{{route('recaudaciones')}}">Ver Recaudacion</a> <br>	
			<a  href="{{route('mostrarAdmin')}}">Volver al perfil</a> <br>		
			</div>
			</body>
		</html>