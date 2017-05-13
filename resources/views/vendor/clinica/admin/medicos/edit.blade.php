@extends('adminlte::layout.index')

@section('title')
Editar usuarios
@endsection

@section('before_styles')
@endsection

@section('after_styles')
@endsection

@section('messages')
@endsection

@section('title-page')
Medicos
@endsection

@section('description-page')
Todo sobre medicos
@endsection

@section('content')

{{Form::open(['route' => ['admin.medicos.update', Crypt::encrypt($data->id)], 'method' => 'patch', 'role' => 'form'])}}
@include('vendor.clinica.partial.errors')
<div class="box">
	<div class="box-header">
		<h3 class="box-title"><i class="fa fa-user-md fa-2x"></i> EDITAR INFORMACION DE  USUARIO</h3>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col col-lg-6 col-md-12 col-xs-12">
				<div class="form-group">
					{{ Form::label('nombre', 'NOMBRE') }}
					{{ Form::text('nombre', $data->people->name, ['class' => 'form-control text-uppercase', 'placeholder' => 'escriba sus nombres']) }}
				</div>

				<div class="form-group">
					{{ Form::label('apellidop', 'PRIMER APELLIDO') }}
					{{ Form::text('apellidop', $data->people->firstname, ['class' => 'form-control text-uppercase', 'placeholder' => 'escriba primer apellido']) }}
				</div>

				<div class="form-group">
					{{ Form::label('apellidom', 'SEGUNDO APELLIDO') }}
					{{ Form::text('apellidom', $data->people->lastname, ['class' => 'form-control text-uppercase', 'placeholder' => 'escriba segundo apellido']) }} 
				</div>
			</div>

			<div class="col col-lg-6 col-md-12 col-xs-12">
				<div class="form-group">
					{{ Form::label('username', 'NOMBRE DE USUARIO') }}
					{{ Form::text('username', $data->username, ['class' => 'form-control text-uppercase', 'readonly' => 'true']) }}
				</div>

				<div class="form-group">
					{{ Form::label('email', 'CORREO ELECTRONICO') }}
					{{ Form::email('email', $data->email, ['class' => 'form-control', 'readonly' => 'true']) }}
				</div>

				<div class="form-group">
					{{ Form::label('estadp', 'ESTADO DE USUARIO') }}
					{{ Form::select('estado', ['habilitado' => 'HABILITADO', 'inhabilitado' => 'INHABILITADO'], $data->type, ['class' => 'form-control']) }}
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
@endsection

