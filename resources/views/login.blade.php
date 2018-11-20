@extends('layouts.app')

@section('content')
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1 class="panel-title" class="titulos">Acceso a la aplicación</h1>
				</div>
				<div class="panel-body">
					<form method="POST" action="{{ route('login') }}">
						{{ csrf_field()}}
						<div class="form-group {{ $errors->has('email') ?'has-error':''}}">
							

							<label class="titulos" for="email">Email</label>
							<input class="form-control" 
							type="email" 
							name="email" 
							value="{{ old('email')}}"
							placeholder="Ingresa tu email">
							{!! $errors->first('email','<span class ="help-block">:message</span>') !!}
						</div>

						<div class="form-group {{ $errors->has('contrasenia') ?'has-error':''}}">
							<label class="titulos" for="contrasenia">Contraseña</label>
							<input class="form-control" 
							type="contrasenia" 
							name="contrasenia" 
							placeholder="Ingresa tu contrasenia">
							{!! $errors->first('contrasenia','<span class ="help-block">:message</span>') !!}
						</div>

						<button class="btn btn-primary btn-block">Acceder</button>

					</form>
				</div>

			
@endsection