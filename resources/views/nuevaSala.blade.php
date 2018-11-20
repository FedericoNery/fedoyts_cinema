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
			<title>REGISTRAR SALA</title>
		</head>

		<body>
			<div class="container">
			<h1 class="titulos">REGISTRAR SALA</h1>
			<form method="POST" action="{{ url('/salas/registrar')  }}">
				{{csrf_field()}}
				<label class="titulos">Cantidad de butacas:</label> <input name="cantidad_butacas" type="number" min="100" max="500" step="10" value ="100"><br>
				<label class="titulos">Precio: </label><input type="number" step="0.10" min="50" name="precio"><br>
				<button type="submit" class="btn btn-primary">Enviar</button>
			</form>
			<br>
			<a  href="{{route('dashboardAdmin')}}">Volver al Dashboard del Admin</a> <br>
			</div>
			
		</body>
		</html>