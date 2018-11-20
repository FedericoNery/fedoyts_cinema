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
  			<link rel="stylesheet" href="../css/estilos/reservaPDF.css">
			<title>RESERVA A PDF</title>
		</head>

		<body>
			<table class="table-bordered">
				<tr>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Email</th>
					<th>Telefono</th>
				</tr>
				<tr>
					<td>{{$datosDeLaSesion['nombre']}}</td>
					<td>{{$datosDeLaSesion['apellido']}}</td>
					<td>{{$datosDeLaSesion['email']}}</td>
					<td>{{$datosDeLaSesion['telefono']}}</td>
					
				</tr>
				
			</table>
			<table class="table-bordered">
				<tr>
					<th>Sala</th>
					<th>Nro Butaca</th>
					<th>Pelicula</th>
					<th>Dia</th>
				</tr>
				@foreach($datosDeLaReserva['butacasSeleccionadas'] as $reserva)
					<tr>
					<td>{{$datosDeLaReserva['Salas_disponibles']}}</td>
					<td>{{$reserva}}</td>
					<td>{{$datosDeLaSesion['nombrePelicula']->nombre}}</td>
					<td>{{$datosDeLaReserva['Fechas_y_Horarios_disponibles']}}</td>
					</tr>
				@endforeach
				
			</table>
			
		</body>
		</html>