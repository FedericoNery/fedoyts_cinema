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
			<title>RESERVA EXITOSA</title>
		</head>

		<body>
						<div class="alert alert-success" role="alert">
			  <h4 class="alert-heading">Reserva Realizada!</h4>
			  <p>Recuerde que en su perfil, en la sección "Mis Reservas" puede consultar su historial de reservas</p>
			  <hr>
			  <p class="mb-0">Puede regresar al perfil o descargar su reserva</p>
			  <a href="{{ route('reserva.pdf') }}" class="btn btn-sm btn-primary">
			            Descargar Reserva
			        </a>
			        <br>
			  <a class="btn btn-light btn-lg" href="{{ route('mostrarUsuario')}}" role="button">Volver al Perfil</a>
			</div>
			
		</body>
		</html>


	

