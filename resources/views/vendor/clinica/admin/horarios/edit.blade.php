@extends('adminlte::layout.index')

@section('title')
Editar horario
@endsection

@section('before_styles')
@endsection

@section('after_styles')
	{!! Html::style('vendor/adminlte/plugins/datepicker/datepicker3.css') !!}
@endsection

@section('messages')
@endsection

@section('title-page')
Medicos
@endsection

@section('description-page')
Todo sobre horarios medicos
@endsection

@section('content')

{{Form::open(['route' => ['admin.horarios.update', Crypt::encrypt($data->id)], 'method' => 'patch', 'role' => 'form'])}}
@include('vendor.clinica.partial.errors')
@include('timepicker')
<div class="box">
	<div class="box-header">
		<h3 class="box-title"><i class="fa fa-user-md fa-2x"></i> EDITAR HORARIO DEL MEDICO</h3>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col col-lg-6 col-md-12 col-xs-12">
				<div class="form-group">
					{{ Form::label('turno', 'TURNO') }}
					{{ Form::select('turno', ['mañana' => 'mañana', 'tarde' => 'tarde', 'noche' => 'noche'], old('turno'), ['class' => 'form-control text-uppercase']) }}
				</div>

				<div class="form-group">
					{{ Form::label('tiempo', 'TIEMPO CONSULTA') }}
					{{ Form::select('tiempo', ['15' => '15 min', '20' => '20 min'], old('tiempo'), ['class' => 'form-control text-uppercase']) }}
				</div>

				<div class="form-group">
					{{ Form::label('fecha_inicio', 'DESDE FECHA') }}
					{{ Form::text('fecha_inicio', Carbon\Carbon::now()->toDateString(), ['class' => 'form-control datepicker']) }}
				</div>

				<div class="form-group">
					{{ Form::label('fecha_fin', 'HASTA FECHA') }}
					{{ Form::text('fecha_fin', Carbon\Carbon::now()->toDateString() , ['class' => 'form-control datepicker'])  }}
				</div>
			</div>

			<div class="col col-lg-6 col-md-12 col-xs-12">

				<div class="form-group">
					{{ Form::label('hora_inicio', 'HORA INICIO') }}
					    <div class='input-group date' id='datetimepicker'>
						    <input class="form-control" type="text" name="hora_inicio" id="time" placeholder= "ingrese la hora de entrada", required= "true"/>
						        <span class="input-group-addon">
						            <span class="glyphicon glyphicon-time"></span>
						        </span>
						</div>
				</div>
				<script>
					    $('#time').datetimepicker({
					        format: 'LT'
					    });
				</script>					                    
				<div class="form-group">
					{{ Form::label('hora_fin', 'HORA FIN') }}
				    <div class='input-group date' id='datetimepicker'>
				        <input class="form-control" type="text" name="hora_fin" id="time2" placeholder= "ingrese la hora de salida",required= "true"/>
				        <span class="input-group-addon">
				            <span class="glyphicon glyphicon-time"></span>
				        </span>
				    </div>
				</div>
				<script>
				    $('#time2').datetimepicker({
				    format: 'LT'
					});
				</script>
						                

			</div>

				
			<div class="col col-lg-12 col-md-12 col-xs-12">
				<div class="form-group">
					<a href="{{ url('admin/horarios') }}" class="btn btn-danger"><i class="fa fa-times"> CANCELAR</i></a>
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
			startDate: '0d',
			format: 'yyyy-mm-dd'
		});
	</script>
@endsection

