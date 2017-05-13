@extends('adminlte::layout.index')

@section('title')
Crear medicos
@endsection

@section('before_styles')
@endsection

@section('after_styles')
	{!! Html::style('vendor/adminlte/plugins/select2/select2.min.css') !!}
@endsection

@section('messages')
@endsection

@section('title-page')
medicos
@endsection

@section('description-page')
Todo sobre medicos
@endsection

@section('content')

	@if(count($data) > 0)
		{{Form::open(['route' => 'admin.medicos.store', 'method' => 'post', 'role' => 'form'])}}
		@include('vendor.clinica.partial.errors')
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"><i class="fa fa-user-md fa-2x"></i> NUEVO MEDICO</h3>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col col-lg-6 col-md-12 col-xs-12">
						<div class="form-group">
							{{ Form::label('nombre', 'NOMBRE') }}
							{{ Form::text('nombre', old('nombre'), ['class' => 'form-control text-uppercase', 'placeholder' => 'escriba sus nombres','required' => 'true',  'minlength' => '3']) }}
						</div>

						<div class="form-group">
							{{ Form::label('apellidop', 'PRIMER APELLIDO') }}
							{{ Form::text('apellidop', old('apellidop'), ['class' => 'form-control text-uppercase', 'placeholder' => 'escriba primer apellido',  'minlength' => '3']) }}
						</div>

						<div class="form-group">
							{{ Form::label('apellidom', 'SEGUNDO APELLIDO') }}
							{{ Form::text('apellidom', old('apellidom'), ['class' => 'form-control text-uppercase', 'placeholder' => 'escriba segundo apellido',  'minlength' => '3']) }} 
						</div>

						<div class="form-group">
							{{ Form::label('username', 'NOMBRE DE USUARIO') }}
							{{ Form::text('username', old('username'), ['class' => 'form-control', 'placeholder' => 'escriba nombre de usuario', 'minlength' => '6' ,'maxlength' =>'15',  'required' => 'true' ]) }}
						</div>

						<div class="form-group">
							{{ Form::label('ci', 'CEDULA DE IDENTIDAD') }}
							{{ Form::text('ci', old('ci'), ['class' => 'form-control text-uppercase', 'placeholder' => 'escriba el numero de ci' ,  'minlength' => '7' ,'maxlength' => '15', 'pattern' =>'\d*', 'title' =>'este campo solo debe contener numeros ', 'required' => 'true', 'minlength'=>'7', 'maxlength' => '8']) }} 
						</div>
						
					</div>
					

					<div class="col col-lg-6 col-md-12 col-xs-12">
						<div class="form-group">
							{{ Form::label('email', 'CORREO ELECTRONICO') }}
							{{ Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'ejemplogmail.com','required' => 'true']) }}
						</div>



						<div class="form-group">
							{{ Form::label('password', 'CONTRASEÑA') }}
							<input type="password" name="password" id="password" class="form-control" required="true">
						</div>

						<div class="form-group">
							{{ Form::label('password_confirmation', 'REPITA CONTRASEÑA') }}
							<input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required="true">
						</div>

						<div class="form-group">
							{{ Form::label('especialidad', 'ESPECIALIDAD') }}
							<select name="especialidad" id="especialidad"  class="form-control select2">
								@foreach($data as $row)
									<option  value="{{ $row->id }}">{{ strtoupper($row->nombre) }}</option>							 
								@endforeach
							</select>
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
	@else
	<div class="alert alert-danger">
          <b>INFORMACION</b> no se registro ninguna especilidad hacla click aqui para crear una nueva!!!
          <br>
          <a href="{{url('admin/especialidades/create')}}" class="btn btn-sm btn-primary">CREAR ESPECIALIDAD</a>
        </div>
	@endif

@endsection

@section('before_scripts')

@endsection

@section('after_scripts')
{!! Html::script('vendor/adminlte/plugins/select2/select2.full.min.js') !!}
	<script>
		$('.select2').select2();
	</script>
@endsection

