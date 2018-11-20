<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Pagina de Inicio
Route::get('/', 'ControladorDePelicula@cargarPaginaDeInicioConTodasLasPeliculas')->name('paginaDeInicio');



//Alta de Usuario
Route::get('usuarios/nuevo', 'ControladorDelUsuario@devolverFormularioNuevoUsuario')->name('nuevoUsuario');
Route::post('usuarios/crear','ControladorDelUsuario@guardarNuevoUsuario');

//Baja de Usuario
Route::get('/usuarios/eliminar', function () {
    return view('eliminarUsuario');
});



//Alta de Pelicula
Route::get('peliculas/nueva','ControladorDePelicula@devolverFormularioNuevaPelicula')->name('registrarPelicula');
Route::post('peliculas/registrar','ControladorDePelicula@guardarNuevaPelicula');

//Baja de Pelicula

//Modificar de Pelicula
Route::get('peliculas/modificar','ControladorDePelicula@devolverFormularioModificarPelicula')->name('modificarPelicula');
Route::post('peliculas/modificado','ControladorDePelicula@guardarPeliculaModificada');


//Alta de Sala
Route::get('salas/nueva','ControladorDeSala@devolverFormularioNuevaSala')->name('nuevaSala');
Route::post('salas/registrar','ControladorDeSala@guardarNuevaSala');
//Baja de Sala

//Modificar de Sala
Route::get('salas/modificar','ControladorDeSala@devolverFormularioModificarSala')->name('salaModificada');
Route::post('salas/modificado','ControladorDeSala@guardarSalaModificada');

//Alta salas_peliculas
Route::get('proyectarPeliculaEn/nuevaProyeccion','ControladorDeSalasPeliculas@devolverFormularioNuevaProyeccion')->name('nuevaProyeccion');
Route::post('proyectarPeliculaEn/registrar','ControladorDeSalasPeliculas@guardarNuevaProyeccion');
//Baja de salas_peliculas

//Modificar de salas_peliculas

//Alta de reservas
Route::get('reservas/nueva/{id}','ControladorDeReserva@devolverFormularioNuevaReserva')->name('nuevaReserva');

Route::post('reservas/registrar','ControladorDeReserva@guardarNuevaReserva');

Route::post('reservas/confirmar','ControladorDeReserva@mostrarConfirmarReserva');

Route::get('reservas/exitosa','ControladorDeReserva@mostrarReservaExitosa')->name('reservaExitosa');
//Baja de reservas

//Modificar reservas

//Iniciar Sesion
Route::get('/iniciarSesion', 'ControladorDeLogin@mostrarFormularioDeLogin')->name('iniciarSesion');
Route::post("/mostrarUsuario","ControladorDeLogin@login")->name('login');

Route::get('dashboard','ControladorDelDashboard@index')->name('dashboard');

//Salir Sesion
Route::post("logout","ControladorDeLogin@logout")->name('logout');

Route::get("/mostrarUsuario",'ControladorDelUsuario@mostrarUsuario')->name('mostrarUsuario');

Route:: get('/mostrarProyeccionesParaVer', 'ControladorDeReserva@devolverFormularioDeSeleccionDePeliculasDisponibles');

Route::get("/mostrarAdmin",'ControladorDelUsuario@mostrarAdmin')->name('mostrarAdmin');

////////////////////////////////////////////////
//COSAS PARA HACER CON URGENCIA
Route::get('/admin', 'ControladorDelAdministrador@dashboardAdmin')->name('dashboardAdmin');
//Ver cantidad espectadores del dia por cada sala y recaudacion
Route::get('/recaudacion','ControladorDelAdministrador@verRecaudacion')->name('recaudaciones');

//Ver datos de las peliculas proximas a estrenar
Route::get('/proximosEstrenos','ControladorDeSalasPeliculas@cargarPaginaDeEstrenos')->name('verProximosEstrenos');

//Modificar de Usuario
Route::get('/usuarios/modificar', 'ControladorDelUsuario@mostrarFormularioModificar')->name('mostrarFormularioModificar');

Route::get('/administradores/modificar', 'ControladorDelUsuario@mostrarFormularioModificarAdmin')->name('mostrarFormularioModificarAdmin');

Route::post('usuarios/modificado','ControladorDelUsuario@guardarModificacionUsuario')->name('usuarioModificado');

//Mis Reservas
Route:: get('usuarios/misReservas','ControladorDelUsuario@verMisReservas')->name('verMisReservas');

//Mis Reservas
Route:: get('administradores/misReservas','ControladorDelUsuario@verMisReservasAdmin')->name('verMisReservasAdmin');

//Ver de generar pdf's
Route::get('descargarReserva', 'ControladorDeReserva@reservaAPDF')->name('reserva.pdf');

