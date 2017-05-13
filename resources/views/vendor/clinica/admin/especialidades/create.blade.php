@extends('adminlte::layout.index')

@section('title')
Crear Especialidades
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

{{Form::open(['route' => 'admin.especialidades.store', 'method' => 'post', 'role' => 'form'])}}
@include('vendor.clinica.partial.errors')
<div class="box">
	<div class="box-header">
		<h3 class="box-title"><i class="fa fa-heartbeat fa-2x"></i> NUEVA ESPECIALIDAD</h3>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col col-lg-6 col-md-12 col-xs-12">
				<div class="form-group">
					{{ Form::label('nombre', 'NOMBRE') }}
					{{ Form::text('nombre', old('nombre'), ['class' => 'form-control text-uppercase','required' => 'true', 'minlength' => '3', 'placeholder' => 'escriba sus nombres']) }}
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

