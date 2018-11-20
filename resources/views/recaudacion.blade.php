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
  			<link rel="stylesheet" href="css/estilos/verRecaudacion.css">
			<title>RECAUDACION</title>
		</head>

		<body>
			
			<div class="container">
				<br>
			<br>
			<br>
			<br>
			<br>
			<h1 class="titulos">RECAUDACION</h1>
			<table class="table-bordered">
			<tr>
				<th>
					<p class="titulos">Dia</p>
				</th>
				<th>
					<p class="titulos">Entradas Vendidas</p>
				</th>
				<th>
					<p class="titulos">Total Recaudado</p>
				</th>			
			</tr>
			@foreach($recaudaciones as $recaudacion)
				<tr>
					<td>
						<p class="titulos">{{$recaudacion->Dia}}</p>
					</td>
					<td>
						<p class="titulos">{{$recaudacion->Entradas_Vendidas}}</p>
					</td>
					<td>
						<p class="titulos">${{$recaudacion->Total}}</p>
					</td>	
				</tr>
			@endforeach
			</table>
			<br>
			<br>
			<a  href="{{route('dashboardAdmin')}}">Volver al Dashboard del Admin</a> <br>
			</div>
		</body>
		</html>