<!doctype html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport"
			content="width= device-width, user-scalable=no,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
			<link rel="shortcut icon" type="image/png" href="../../img/popcorn.png"/>
			<meta http-equiv="X-UA-COMPATIBLE" content="ie=edge">
			<link href="../../css/bootstrap.min.css" rel="stylesheet">
			<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  			<link rel="stylesheet" href="../../css/estilos/nuevaReserva.css">
			<title>NUEVA RESERVA</title>
		</head>

		<body>
			<h1 class="titulos">NUEVA RESERVA</h1>
			<form method="POST" action="{{ url('/reservas/confirmar')  }}">
				{{csrf_field()}}
				<input type="hidden" name="idPeliculaParaVer" value="{{$peliculaSeleccionada}}">
				
				<select id="comboSalasDisponibles" name="Salas disponibles">
					@foreach($salasDondeSeProyectaLaPelicula as $sala)
						<option value="{{$sala->id_sala}}">Sala {{$sala->id_sala}}</option>
					@endforeach
				</select>

				<select  id="comboFechasyHorariosDisponibles" name="Fechas y Horarios disponibles">
				</select>
				<!-- IMPORTANTE-->
				<script type="text/javascript">
					
					var cadenaDelDia = "";
					var today = new Date();
					var dd = today.getDate();
					var mm = today.getMonth()+1; //January is 0!
					var yyyy = today.getFullYear();
					var time = today.getHours();
					console.log(time);
					var hh = 0;
					var month = new Array();
					month[0] = "Enero";month[1] = "Febrero";month[2] = "Marzo";month[3] = "Abril";
					month[4] = "Mayo";month[5] = "Junio";month[6] = "Julio";month[7] = "Agosto";
					month[8] = "Septiembre";month[9] = "Octubre";month[10] = "Noviembre";
					month[11] = "Diciembre";
					 if(dd<10){
					        dd='0'+dd
					    } 
					    if(mm<10){
					        mm='0'+mm
					    } 

					var primerOpcion = false;
					var segundaOpcion = false;
					var terceraOpcion = false;
					var cuartaOpcion = false;
					var quintaOpcion = false;
					for (var i = 0; i < 5; i++) {
						if(i == 0 && 11 > time){hh = 11; primerOpcion = true;}
						if(i == 1 && 14 > time){hh = 14; segundaOpcion = true;}
						if(i == 2 && 17 > time){hh = 17; terceraOpcion = true;}
						if(i == 3 && 20 > time){hh = 20; cuartaOpcion = true;}
						if(i == 4 && 23 > time){hh = 23; quintaOpcion = true;}
						today = yyyy+'-'+mm+'-'+dd + '-' + hh;
						var o = new Option(today, today);
						cadenaDelDia = dd + ' de ' + month[mm-1] + ' a las ' + hh +':00 horas';
						if(primerOpcion){
							$(o).html(cadenaDelDia);$("#comboFechasyHorariosDisponibles").append(o);
						}
						if(segundaOpcion){
							$(o).html(cadenaDelDia);$("#comboFechasyHorariosDisponibles").append(o);
						}
						if(terceraOpcion){
							$(o).html(cadenaDelDia);$("#comboFechasyHorariosDisponibles").append(o);
						}
						if(cuartaOpcion){
							$(o).html(cadenaDelDia);$("#comboFechasyHorariosDisponibles").append(o);
						}
						if(quintaOpcion){
							$(o).html(cadenaDelDia);$("#comboFechasyHorariosDisponibles").append(o);
						}
									
					}
					var tomorrow = new Date();
					tomorrow.setDate(tomorrow.getDate() + 1);
					mm = tomorrow.getMonth();
					dd = tomorrow.getDate();
					yyyy = tomorrow.getFullYear();
					hh = 0;
					for (var i = 0; i < 5; i++) {
						if(i == 0 ){hh = 11;}
						if(i == 1 ){hh = 14;}
						if(i == 2 ){hh = 17;}
						if(i == 3 ){hh = 20;}
						if(i == 4 ){hh = 23;}
						tomorrow = yyyy+'-'+mm+'-'+dd + '-' + hh;
						var o = new Option(tomorrow, tomorrow);
						cadenaDelDia = dd + ' de ' + month[mm-1] + ' a las ' + hh +':00 horas';
						$(o).html(cadenaDelDia);
						$("#comboFechasyHorariosDisponibles").append(o);			
					}

				</script>
				<br>

				<table>
					<!--Mostrar las butacas segun colores -->
					<tr>
						<td class="tdButacasSegunColor">
							<label class="checkeable">NO DISPONIBLE
				  			<img src="../../img/butacaOcupada.png" class="imgOcupada"/>
							</label>
						</td>
						<td>
							<label class="checkeable">SELECCIONADA
				  			<img src="../../img/butacaSeleccionada.png" class="imgSeleccionada" />
							</label>
						</td>
						<td>
							<label class="checkeable">DISPONIBLE
				  			<img src="../../img/butacaSeleccionada.png" class="imgDisponible"/>
							</label>
						</td>
					</tr>
				</table>
				

				<div id="contenedorDeButacas">
					<table id="tablaDeButacas">
						
					</table>
				</div>

				<script type="text/javascript">
					generarButacas();

					$("#comboSalasDisponibles").change(function(){
						generarButacas();
					})

					function generarButacas(){
						var id_sala = $('#comboSalasDisponibles').val();
						var infoDeLasSalas = @json($infoSalas);
    					console.log(infoDeLasSalas);

						for(var i=0; i < infoDeLasSalas.length ; i++){
 							if(id_sala == (infoDeLasSalas[i]["id_sala"])){
 								//generar las butacas etc
 								//alert('Butacas:'+infoDeLasSalas[i]["cantidad_butacas"]);
 								vaciarContainer();
 								agregarButacas(infoDeLasSalas[i]["cantidad_butacas"]);
 							}
						}
					}

					function vaciarContainer(){
						$('#tablaDeButacas').empty();
					}

					function agregarButacas(cantidadDeButacas) {
   						var container = $('#tablaDeButacas');
   						var trAbrir = "<tr>";
   						var trCerrar = "</tr>";
   						var tdAbrir = "<td>";
   						var tdCerrar = "</td>";
   						var labelAbrir ="<label class='checkeable'>";
   						var labelCerrar="</label>"; 
   						var imgButacaDisponible = '<img src="../../img/butacaSeleccionada.png"/>';	
   						var htmlGenerado ="";
   						htmlGenerado = htmlGenerado + trAbrir;
   						for(var i=0; i <cantidadDeButacas;i++ ){
   							if(i%15 == 0 && i!=0){
   							
   								htmlGenerado = htmlGenerado + trCerrar;
   								htmlGenerado = htmlGenerado + trAbrir;
   							}
   							htmlGenerado = htmlGenerado + tdAbrir;
   							htmlGenerado = htmlGenerado + labelAbrir;
   							htmlGenerado = htmlGenerado + 
   							'<input type="checkbox"  name="butacasSeleccionadas[]" id="' + i + '" value="' + i + '">';
   							htmlGenerado = htmlGenerado + imgButacaDisponible;
   							htmlGenerado = htmlGenerado + labelCerrar;
   							htmlGenerado = htmlGenerado + "<label class='titulos'>" +i + "</label>";
   							htmlGenerado = htmlGenerado + tdCerrar;

   						}
   					
   						htmlGenerado = htmlGenerado + trCerrar;
   						$('#tablaDeButacas').append(htmlGenerado);
						
					}

				</script>
		
				

				<button type="submit" class="btn btn-primary">Enviar</button>

			</form>
		</body>
		</html>