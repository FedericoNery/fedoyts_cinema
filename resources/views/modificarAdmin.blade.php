<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	content="width= device-width, user-scalable=no,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-COMPATIBLE" content="ie=edge">
	<link rel="shortcut icon" type="image/png" href="../../img/popcorn.png"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

  	<link rel="stylesheet" href="../css/estilos/iniciarSesion.css">
	<title> MODIFICAR ADMINISTRADOR</title>
</head>

<body>
	<div class="container">
	<h1>MODIFICAR ADMINISTRADOR</h1>
	<form method="POST" action="{{ url('/usuarios/modificado')  }}">

	{{csrf_field()}}
	<label class="titulos">Nombre: </label>
	<input type="text" name="nombre" value="{{$datosDeLaSesion['nombre']}}"><br>

	<label class="titulos">Apellido: </label>
  	 <input type="text" name="apellido" value="{{$datosDeLaSesion['apellido']}}"><br>

	<label class="titulos">Email: </label>
  	<input type="email" name="email" value="{{$datosDeLaSesion['email']}}"><br>

	<label class="titulos">Telefono: </label>
  	<input type="text" name="telefono" value="{{$datosDeLaSesion['telefono']}}"><br>

	<label class="titulos">Fecha de Nacimiento: </label>
  	<input id="date" type="date" name="fecha_de_nacimiento" value="{{$datosDeLaSesion['fecha_de_nacimiento']}}"> <br>

	<label class="titulos">Contraseña: </label>
  	<input type="text" name="contrasenia" value="{{$datosDeLaSesion['contrasenia']}}"><br>
  	
	<button type="submit" class="btn btn-primary">Enviar</button>

	</form>
	<br>
	<br>
	<a href="{{route('mostrarAdmin')}}">Volver al perfil del Administrador</a> <br>
</div>
</body>
</html>