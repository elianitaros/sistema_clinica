@extends('adminlte::layout.index')

@section('title')
Editar Especialidad
@endsection

@section('before_styles')
@endsection

@section('after_styles')
@endsection

@section('messages')
@endsection

@section('title-page')
Especialidades
@endsection

@section('description-page')
Todo sobre especialidades
@endsection

@section('content')

{{Form::open(['route' => ['admin.especialidades.update', Crypt::encrypt($data->id)], 'method' => 'patch', 'role' => 'form'])}}
@include('vendor.clinica.partial.errors')
<div class="box">
	<div class="box-header">
		<h3 class="box-title"><i class="fa fa-heartbeat fa-2x"></i> EDITAR INFORMACION DE  USUARIO</h3>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col col-lg-6 col-md-12 col-xs-12">
				<div class="form-group">
					{{ Form::label('nombre', 'NOMBRE') }}
					{{ Form::text('nombre', $data->nombre, ['class' => 'form-control text-uppercase','required' => 'true',   'placeholder' => 'escriba sus nombres']) }}
				</div>

				
				<div class="form-group">
					{{ Form::label('estado', 'ESTADO DE ESPECIALIDAD') }}
					{{ Form::select('estado', ['habilitado' => 'HABILITADO', 'eliminado' => 'ELIMINADO'], $data->type, ['class' => 'form-control']) }}
				</div>
			</div>
			<div class="col col-lg-12 col-md-12 col-xs-12">
				<div class="form-group">
					<a href="{{ url('admin/especialidades') }}" class="btn btn-danger"><i class="fa fa-times"> CANCELAR</i></a>
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

