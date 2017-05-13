@extends('adminlte::layout.index')

@section('title')
Crear filiacion nueva
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
Datos del Paciente
@endsection

@section('content')

{{Form::open(['route' => 'fichaje.pacientes.store', 'method' => 'post', 'role' => 'form'])}}
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
					{{ Form::text('nombre', old('nombre'), ['class' => 'form-control text-uppercase', 'placeholder' => 'escriba sus nombres', 'required' => 'true', 'minlength' => '3' ,'maxlength' =>'30']) }}
				</div>

				<div class="form-group">
					{{ Form::label('apellidop', 'PRIMER APELLIDO') }}
					{{ Form::text('apellidop', old('apellidop'), ['class' => 'form-control text-uppercase', 'placeholder' => 'escriba primer apellido', 'minlength' => '3']) }}
				</div>

				<div class="form-group">
					{{ Form::label('apellidom', 'SEGUNDO APELLIDO') }}
					{{ Form::text('apellidom', old('apellidom'), ['class' => 'form-control text-uppercase', 'placeholder' => 'escriba segundo apellido', 'minlength' => '3']) }} 
				</div>
				
				<div class="form-group">
					{{ Form::label('fecha_nacimiento', 'FECHA NACIMIENTO') }}
					{{ Form::text('fecha_nacimiento', Carbon\Carbon::now()->age , ['class' => 'form-control datepicker' ,'required' => 'true'])  }}
				</div>

				<div class="form-group">
					{{ Form::label('genero', 'GENERO') }}
					<div class="form-group">
						<label class="radio-inline">
	                        <input type="radio" name="genero" value="Femenino"> Femenino
	                    </label>
	                        
	                    <label class="radio-inline">
	                         <input type="radio" name="genero" value="Masculino" checked> Masculino
	                    </label>
	                </div>
				</div>

				<div class="form-group">
					{{ Form::label('ci', 'CEDULA DE IDENTIDAD') }}
					{{ Form::text('ci', old('ci'), ['class' => 'form-control text-uppercase', 'placeholder' => 'escriba el numero de ci' ,  'minlength' => '7' ,'maxlength' => '15', 'pattern' =>'\d*', 'title' =>'este campo solo debe contener numeros ', 'required' => 'true', 'minlength'=>'7', 'maxlength' => '8']) }} 
				</div>

				<div class="form-group">
					{{ Form::label('direccion', 'DIRECCION DE DOMICILIO') }}
					{{ Form::text('direccion', old('direccion'), ['class' => 'form-control', 'placeholder' => 'escriba la direccion del afiliado', 'required' => 'true', 'minlegnth' => '5','maxlength'=>'30']) }}
				</div>
				
				<div class= "form-group">
					{{ Form::label('estado_civil', 'ESTADO CIVIL') }}
					{{ Form::select('estado_civil', ['soltero(a)'=>'SOLTERO', 'casado(a)'=>'CASADO', 'viudo(a)'=>'VIUDO',  'union libre'=>'UNION LIBRE'],null, ['class' => 'form-control text-uppercase']) }}
				</div>				

			</div>

			<div class="col col-lg-6 col-md-12 col-xs-12">

				
					
				<div class="form-group">
					{{ Form::label('ocupacion', 'OCUPACION') }}
					{{ Form::text('ocupacion', old('ocupacion'), ['class' => 'form-control', 'placeholder' => 'escriba la ocupacion actual del afiliado','required' =>'true','minlength'=>'4','maxlength' =>'25' ]) }}
				</div>

				<div class= "form-group">
					{{ Form::label('origen' , 'RESIDENCIA') }}
					{{ Form::text ('origen' , old('origen') , ['class' => 'form-control' , 'placeholder' => 'escriba el lugar de origen actual del paciente', 'required' => 'true', 'minlength' =>'5' ]) }}
				</div>

				<div class= "form-group">
					{{ Form::label('telef' , 'TELEFONO (opcional)') }}
					{{ Form::text ('telef' , old('telef') , ['class' => 'form-control' , 'placeholder' => 'escriba el telefono actual del paciente', 'minlength' => '7' ,'maxlength' => '15']) }}
				</div>

				<div class= "form-group">
					{{ Form::label('celular' , 'N° DE CELULAR') }}
					{{ Form::text ('celular' , old('celular') , ['class' => 'form-control' , 'placeholder' => '+591-70000000','required'=> 'true','minlength'=>'8','maxlength'=> '15' ]) }}
				</div>

				<div class= "form-group">
					{{ Form::label('caso_emergencia' , 'CASO DE EMERGENCIA') }}
					{{ Form::text ('caso_emergencia' , old('caso_emergencia') , ['class' => 'form-control' , 'placeholder' => 'escriba el origen actual del paciente','required'=> 'true', 'minlength' => '7' ,'maxlength' => '30']) }}
				</div>

				<div class= "form-group">
					{{ Form::label('telef_opcional' , 'N° DE CELULAR OPCIONAL') }}
					{{ Form::text ('telef_opcional' , old('telef_opcional') , ['class' => 'form-control' , 'placeholder' => 'escriba el origen actual del paciente', 'minlength' => '7' ,'maxlength' => '15', 'pattern' =>'\d*', 'title' =>'este campo solo debe contener numeros']) }}
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

