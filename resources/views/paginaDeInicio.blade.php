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
  			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  			<link rel="stylesheet" href="css/estilos/paginaDeInicio.css">
  			<style>
  /* Make the image fully responsive */
  .carousel-inner img {
      width: 100%;
      height: 550px;
  }
  </style>
			<title>Bienvenido a Fedoyts Cinema</title>
		</head>

		<body>
			<br>
			<br>
			<br>
			
			<nav class="navbar fixed-top navbar-expand-sm bg-dark navbar-dark">
				<!-- Brand/logo style="width:100%; height: 10%;" -->
  				<a class="navbar-brand" href="#">
    				<img src="img/logofedoyts.png" alt="logo" style="width:200px;" >
  				</a>
			  
			  <ul class="navbar-nav mr-auto">
			    <li class="nav-item active">
			      <a class="nav-link" href="{{route('paginaDeInicio')}}">Inicio</a>
			    </li>
			    <li class="nav-item">
			      <a class="nav-link" href="{{route('verProximosEstrenos')}}">Ver Estrenos</a>
			    </li>
			  </ul>
			  <ul class="navbar-nav">
			      <li class="nav-item">
			        <a class="nav-link" href="{{route('iniciarSesion')}}">Iniciar Sesion</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="{{route('nuevoUsuario')}}">Registrarse</a>
			      </li>
			    </ul>
			</nav>


			<div id="demo" class="carousel slide" data-ride="carousel">

			  <!-- Indicators -->
			  <ul class="carousel-indicators">
			    <li data-target="#demo" data-slide-to="0" class="active"></li>
			    <li data-target="#demo" data-slide-to="1"></li>
			    <li data-target="#demo" data-slide-to="2"></li>
			  </ul>

			  <!-- The slideshow -->
			  <div class="carousel-inner">
			    <div class="carousel-item active">
			      <img src="img/starwarsbanner.png" alt="Los Angeles">
			    </div>
			    <div class="carousel-item">
			      <img src="img/fantasticbeastsbanner.jpg" alt="Chicago">
			    </div>
			    <div class="carousel-item">
			      <img src="img/batmanvssupermanbanner.jpg" alt="New York">
			    </div>
			  </div>

			  <!-- Left and right controls -->
			  <a class="carousel-control-prev" href="#demo" data-slide="prev">
			    <span class="carousel-control-prev-icon"></span>
			  </a>
			  <a class="carousel-control-next" href="#demo" data-slide="next">
			    <span class="carousel-control-next-icon"></span>
			  </a>

			</div>
			<br>
			<h1 class="titulos">Peliculas</h1>
			<table class="table">
				<tbody>
			<tr>
			@for ($i = 0; $i < count($peliculas); $i++)
    			@if($i % 3 === 0)
				</tr>
				<br>
				<tr>
    			@endif
    			<th>
				<a href="reservas/nueva/{{$peliculas[$i]->id_pelicula}}"><img src="img/{{$peliculas[$i]->nombre}}.jpg" alt="img/{{$peliculas[$i]->nombre}}" 
    			style="width:420px;height:600px;"></a>
    			</th>
			@endfor
			</tr>
			</tbody>
			</table>

			<footer class="footer" style="background-color:darkslategray;text-align: center;display: -webkit-box;">
      			<div class="container">
        			<p>Creado por <a href="https://github.com/FedericoNery" target="_blank">Federico Nery</a></p>

      			</div>
    		</footer>
		</body>
		</html>