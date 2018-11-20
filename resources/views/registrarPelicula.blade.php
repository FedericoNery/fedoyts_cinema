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
			<title>REGISTRAR PELICULA</title>
		</head>

		<body> 
			<div class="container">
	
			
			<form method="POST" action="{{ url('/peliculas/registrar')  }}">

				{{csrf_field()}}
				<h1 class="titulos">REGISTRAR PELICULA</h1>
				<label class="titulos">Nombre:</label> <input type="text" name="nombre"><br>
				<label class="titulos">Duracion: </label><input type="text" name="duracion"><br>
				<label class="titulos">Sinopsis: </label><input type="text" name="sinopsis"><br>
				<label class="titulos">Actores: </label><input type="text" name="actores"><br>
				<label class="titulos">Fecha de Estreno: </label><input id="date" type="date" name="fecha_de_estreno"> <br>
				<label class="titulos">id_audio: </label><input type="text" name="id_audio"><br>
				<label class="titulos">id_subtitulos: </label><input type="text" name="id_subtitulos"><br>

				<button type="submit" class="btn btn-primary">Enviar</button>

			</form>
			<br>
		<a  href="{{route('dashboardAdmin')}}">Volver al Dashboard del Admin</a> <br>
		</div>

 
		</body>
		</html>
