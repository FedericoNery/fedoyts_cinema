<!doctype html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport"
			content="width= device-width, user-scalable=no,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
			<link rel="shortcut icon" type="image/png" href="img/popcorn.png"/>
			<meta http-equiv="X-UA-COMPATIBLE" content="ie=edge">
			<title>CATALOGO DE PELICULAS</title>
		</head>

		<body>
			<h1>CATALOGO DE PELICULAS</h1>
			Seleccione pelicula para ver
			<form method="POST" action="{{ url('/proyectarPeliculaEn/registrar')  }}">
				<select name="comboPeliculas">
				@foreach($listaDePeliculas as $pelicula)
					<a href="peliculas/nueva">Alta Pelicula</a> <br>
					<option value="{{$pelicula->id_pelicula}}">{{$pelicula->nombre}}</option>
				@endforeach
				</select> <br>
				<button type="submit" class="btn btn-primary">Enviar</button>

			</form>
		</body>
		</html>