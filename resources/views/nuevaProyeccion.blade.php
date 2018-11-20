 <!doctype html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport"
			content="width= device-width, user-scalable=no,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
			<meta http-equiv="X-UA-COMPATIBLE" content="ie=edge">
			<link rel="shortcut icon" type="image/png" href="../img/popcorn.png"/>
			<link href="../css/bootstrap.min.css" rel="stylesheet">
				<link rel="stylesheet" href="../css/estilos/iniciarSesion.css">
			<title>NUEVA PROYECCION</title>
		</head>

		<body> 

			<div class="container">
			<h1 class="titulos">NUEVA PROYECCION</h1>
			<form method="POST" action="{{ url('/proyectarPeliculaEn/registrar')  }}">
				{{csrf_field()}}

				<label class="titulos"> Lista de salas </label>
				<select name="comboSalas">
				@foreach($listaDeSalas as $sala)
					<option value="{{$sala->id_sala}}">{{$sala->id_sala}}</option>
				@endforeach
				</select> <br>

				<label class="titulos">Lista de Peliculas</label>
				<select name="comboPeliculas">
				@foreach($listaDePeliculas as $pelicula)
					<option value="{{$pelicula->id_pelicula}}">{{$pelicula->nombre}}</option>
				@endforeach
				</select> <br>
				<label class="titulos">Fecha Inicio de funciones: </label><input id="date" type="date" name="desde"> <br>
				<label class="titulos">Fecha Finalización de funciones: </label><input id="date" type="date" name="hasta"> <br>

				<button type="submit" class="btn btn-primary">Enviar</button>

			</form>
			<br>
			<a  href="{{route('dashboardAdmin')}}">Volver al Dashboard del Admin</a> <br>
			</div>
			
 
		</body>
		</html>