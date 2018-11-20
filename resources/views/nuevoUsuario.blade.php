<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	content="width= device-width, user-scalable=no,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-COMPATIBLE" content="ie=edge">
	<link rel="shortcut icon" type="image/png" href="../img/popcorn.png"/>
	<title>NUEVO USUARIO</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/estilos/iniciarSesion.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<!--<link href="css/styles.css" rel="stylesheet" >-->
</head>

<body>
<div class="container">
	<form method="POST" action="{{ url('/usuarios/crear')  }}">
	{{csrf_field()}}
	
			<h1 class="titulos">NUEVO USUARIO</h1>
		<label class="titulos">Nombre:</label> <input type="text" name="nombre"><br>
	  	<label class="titulos">Apellido:</label> <input type="text" name="apellido"><br>
	  	<label class="titulos">Email:</label> <input type="email" name="email"><br>
	  	<label class="titulos">Telefono:</label> <input type="text" name="telefono"><br>
	  	<label class="titulos">Fecha de Nacimiento:</label> <input id="date" type="date" name="fecha_de_nacimiento"> <br>
	  	<label class="titulos">Contraseña:</label> <input type="text" name="contrasenia"><br>
	  	<label class="titulos">Soy administrador:</label> <input type="checkbox" id="checkboxEsAdmin"><br>
	  	<label class="titulos" id="soyAdmin" hidden>Ingrese Codigo:</label> <input type="text" name="esAdmin" id="esAdmin" hidden><br>

	  	<script >
	  		$("#checkboxEsAdmin").change(function() {
    			if(this.checked) {
					$("#soyAdmin").prop('hidden',false);
					$("#esAdmin").prop('hidden',false);
    			}
    			else{
    				$("#soyAdmin").prop('hidden',true);
					$("#esAdmin").prop('hidden',true);
    				
    			}
			});
	  	</script>
	  	
		<button type="submit" class="btn btn-primary">Enviar</button>
	
	</form>
</div>
</body>
</html>
