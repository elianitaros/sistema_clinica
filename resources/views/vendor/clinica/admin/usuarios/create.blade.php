@extends('adminlte::layout.index')

@section('title')
Crear usuarios
@endsection

@section('before_styles')
@endsection

@section('after_styles')
@endsection

@section('messages')
@endsection

@section('title-page')
Usuarios
@endsection

@section('description-page')
Todo sobre usuarios
@endsection

@section('content')

{{Form::open(['route' => 'admin.usuarios.store', 'method' => 'post', 'role' => 'form'])}}
@include('vendor.clinica.partial.errors')
<div class="box">
	<div class="box-header">
		<h3 class="box-title"><i class="fa fa-users"></i> NUEVO USUARIO</h3>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col col-lg-6 col-md-12 col-xs-12">
				<div class="form-group">
					{{ Form::label('nombre', 'NOMBRE') }}
					{{ Form::text('nombre', old('nombre'), ['class' => 'form-control text-uppercase', 'placeholder' => 'escriba sus nombres', 'required' => 'true', 'minlength' => '3', 'maxlength' => '25']) }}
				</div>

				<div class="form-group">
					{{ Form::label('apellidop', 'PRIMER APELLIDO') }}
					{{ Form::text('apellidop', old('apellidop'), ['class' => 'form-control text-uppercase', 'placeholder' => 'escriba primer apellido','minlength' => '3']) }}
				</div>

				<div class="form-group">
					{{ Form::label('apellidom', 'SEGUNDO APELLIDO') }}
					{{ Form::text('apellidom', old('apellidom'), ['class' => 'form-control text-uppercase', 'placeholder' => 'escriba segundo apellido','minlength' => '3']) }} 
				</div>

				<div class="form-group">
					{{ Form::label('ci', 'CEDULA DE IDENTIDAD') }}
					{{ Form::text('ci', old('ci'), ['class' => 'form-control text-uppercase', 'placeholder' => 'escriba el numero de ci' ,  'minlength' => '7' ,'maxlength' => '15', 'pattern' =>'\d*', 'title' =>'este campo solo debe contener numeros ', 'required' => 'true', 'minlength'=>'7', 'maxlength' => '8']) }} 
				</div>

				<div class="form-group">
					{{ Form::label('username', 'NOMBRE DE USUARIO') }}
					{{ Form::text('username', old('username'), ['class' => 'form-control', 'placeholder' => 'escriba nombre de usuario', 'required' => 'true', 'minlength' => '6', 'maxlength' => '15']) }}
				</div>
				
			</div>

			<div class="col col-lg-6 col-md-12 col-xs-12">
				<div class="form-group">
					{{ Form::label('email', 'CORREO ELECTRONICO') }}
					{{ Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'ejemplogmail.com']) }}
				</div>

				<div class="form-group">
					{{ Form::label('rol', 'ROL DE USUARIO') }}
					{{ Form::select('rol', ['admin' => 'admin', 'fichaje' => 'fichaje'], old('rol'), ['class' => 'form-control text-uppercase']) }}
				</div>

				<div class="form-group">
					{{ Form::label('password', 'CONTRASEÑA') }}
					<input type="password" name="password" id="password" class="form-control" placeholder = "escriba una contraseña" minlength= "8" maxlength= "15"  required > 
				</div>

				<div class="form-group">
					{{ Form::label('password_confirmation', 'REPITA CONTRASEÑA') }}
					<input type="password" name="password_confirmation" id="password_confirmation" placeholder = "repita la contraseña" class="form-control"  minlength= "8" maxlength= "15" required>
				</div>
			</div>
			<div class="col col-lg-12 col-md-12 col-xs-12">
				<div class="form-group">
					<a href="{{ url('admin/usuarios') }}" class="btn btn-danger"><i class="fa fa-times"> CANCELAR</i></a>
					<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> GUARDAR</button>
				</div>
			</div>
		</div>
	</div>
</div>
{{ Form::close() }}
@endsection

@section('before_scripts')
@endsection

@section('after_scripts')
	{!! Html::script('vendor/adminlte/plugins/datepicker/bootstrap-datepicker.js') !!}
	<script>
		$('.').datepicker({
			format: 'yyyy-mm-dd'
		});
	</script>
@endsection

