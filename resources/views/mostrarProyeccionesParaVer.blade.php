<!doctype html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport"
			content="width= device-width, user-scalable=no,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
			<link rel="shortcut icon" type="image/png" href="img/popcorn.png"/>
			<meta http-equiv="X-UA-COMPATIBLE" content="ie=edge">
			<title>Proyecciones</title>
		</head>

		<body>
			<h1>Proyecciones</h1>

			<select name="comboSalas">
			@foreach($peliculasDisponiblesParaVer as $pelis)
					<p>{{$pelis->id_sala}}</p>
					<p>{{$pelis->nombre}}</p>
					<p>{{$pelis->desde}}</p>
					<p>{{$pelis->hasta}}</p>
			@endforeach
			</select> <br>

		</body>
		</html>