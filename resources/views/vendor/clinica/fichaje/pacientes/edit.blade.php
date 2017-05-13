@extends('adminlte::layout.index')

@section('title')
Editar filiacion
@endsection

@section('before_styles')
@endsection

@section('after_styles')
	{!! Html::style('vendor/adminlte/plugins/datepicker/datepicker3.css') !!}
@endsection

@section('messages')
@endsection

@section('title-page')
Pacientes
@endsection

@section('description-page')
Datos de la filiacion del paciente
@endsection

@section('content')

{{Form::open(['route' => ['fichaje.pacientes.update', Crypt::encrypt($data->id)], 'method' => 'patch', 'role' => 'form'])}}
@include('timepicker')
@include('vendor.clinica.partial.errors')
<div class="box">
	<div class="box-header">
		<h3 class="box-title"><i class="fa fa-female" aria-hidden="true"></i><i class="fa fa-male" aria-hidden="true"></i> NUEVA FILIACION</h3>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col col-lg-6 col-md-12 col-xs-12">
				<div class="form-group">
					{{ Form::label('nombre', 'NOMBRES') }}
					{{ Form::text('nombre', $data->people->name, ['class' => 'form-control text-uppercase', 'placeholder' => 'escriba sus nombres', 'required' => 'true', 'minlength' => '3' ,'maxlength' =>'30']) }}
				</div>

				<div class="form-group">
					{{ Form::label('apellidop', 'PRIMER APELLIDO') }}
					{{ Form::text('apellidop', $data->people->firstname, ['class' => 'form-control text-uppercase', 'placeholder' => 'escriba primer apellido', 'minlength' => '3']) }}
				</div>

				<div class="form-group">
					{{ Form::label('apellidom', 'SEGUNDO APELLIDO') }}
					{{ Form::text('apellidom', $data->people->lastname, ['class' => 'form-control text-uppercase', 'placeholder' => 'escriba segundo apellido', 'minlength' => '3']) }} 
				</div>
				
				<div class="form-group">
					{{ Form::label('fecha_nacimiento', 'FECHA NACIMIENTO') }}
					{{ Form::text('fecha_nacimiento', $data->fecha_nac , ['class' => 'form-control datepicker' ,'required' => 'true'])  }}
				</div>


				<div class="form-group">
					{{ Form::label('direccion', 'DIRECCION DE DOMICILIO') }}
					{{ Form::text('direccion', $data->direccion, ['class' => 'form-control', 'placeholder' => 'escriba la direccion del afiliado', 'required' => 'true', 'minlegnth' => '5','maxlength'=>'30']) }}
				</div>
				
				<div class= "form-group">
					{{ Form::label('estado_civil', 'ESTADO CIVIL') }}
					{{ Form::select('estado_civil', ['soltero(a)'=>'SOLTERO', 'casado(a)'=>'CASADO', 'viudo(a)'=>'VIUDO',  'union libre'=>'UNION LIBRE'],null, ['class' => 'form-control text-uppercase']) }}
				</div>				

			</div>

			<div class="col col-lg-6 col-md-12 col-xs-12">

				
					
				<div class="form-group">
					{{ Form::label('ocupacion', 'OCUPACION') }}
					{{ Form::text('ocupacion', $data->ocupacion, ['class' => 'form-control', 'placeholder' => 'escriba la ocupacion actual del afiliado','required' =>'true','minlength'=>'4','maxlength' =>'25' ]) }}
				</div>

				<div class= "form-group">
					{{ Form::label('origen' , 'RESIDENCIA') }}
					{{ Form::text ('origen' , $data->origen, ['class' => 'form-control' , 'placeholder' => 'escriba el lugar de origen actual del paciente', 'required' => 'true', 'minlength' =>'5' ]) }}
				</div>

				<div class= "form-group">
					{{ Form::label('celular' , 'N° DE CELULAR') }}
					{{ Form::text ('celular' , $data->celular , ['class' => 'form-control' , 'placeholder' => '+591-70000000','required'=> 'true','minlength'=>'8','maxlength'=> '15' ]) }}
				</div>
				
				<div class="form-group">
					{{ Form::label('estadp', 'ESTADO DE USUARIO') }}
					{{ Form::select('estado', ['habilitado' => 'HABILITADO', 'eliminado' => 'ELIMINADO'], $data->type, ['class' => 'form-control']) }}
				</div>
			</div>



			<div class="col col-lg-12 col-md-12 col-xs-12">
				<div class="form-group">
					<a href="{{ url('fichaje/pacientes') }}" class="btn btn-danger"><i class="fa fa-times"> CANCELAR</i></a>
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
		$('.datepicker').datepicker({
			format: 'yyyy-mm-dd'
		});
	</script>
@endsection

