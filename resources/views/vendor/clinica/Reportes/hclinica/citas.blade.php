@extends('adminlte::layout.index')

@section('title')
Horarios
@endsection

@section('before_styles')
@endsection

@section('after_styles')
	{!! Html::style('vendor/adminlte/plugins/datepicker/datepicker3.css') !!}
	{!! Html::style('vendor/adminlte/plugins/select2/select2.min.css') !!}
@endsection

@section('messages')
@endsection

@section('title-page')
Horarios
@endsection

@section('description-page')
Descripcion de Horarios
@endsection

@section('content')

{{Form::open(['url' => 'hclinica/citas', 'method' => 'post', 'role' => 'form'])}}
@include('timepicker')
@include('vendor.clinica.partial.errors')
<div class="box">
	<div class="box-header">
		<h3 class="box-title"><i class="fa fa-calendar-o fa-2x"></i> PERSONALIZAR REPORTE</h3>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col col-md-6">
				<div class="form-group">
					{{ Form::label('fecha_inicio', 'DESDE FECHA') }}
					{{ Form::text('fecha_inicio', Carbon\Carbon::now()->subMonth(1)->toDateString(), ['class' => 'form-control datepicker']) }}
				</div>

				<div class="form-group">
					{{ Form::label('fecha_fin', 'HASTA FECHA') }}
					{{ Form::text('fecha_fin', Carbon\Carbon::now()->toDateString() , ['class' => 'form-control datepicker'])  }}
				</div>
			</div>

			<div class="col col-md-6">
				<div class="form-group">
					{{ Form::label('medico', 'MEDICOS') }}
					<select name="medico" id="medico" class="form-control">
						<option value="all">TODOS LOS MEDICOS</option>
						@foreach($data as $row)
							<option value="{{ $row->id }}">{{ strtoupper($row->people->name) }} {{ strtoupper($row->people->firstname) }} {{ strtoupper($row->people->lastname) }}</option>
						@endforeach
					</select>
				</div>
			</div>

			
			<div class="col col-lg-12 col-md-12 col-xs-12">
				<div class="form-group">
					<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> GENERAR REPORTE</button>
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
	{!! Html::script('vendor/adminlte/plugins/select2/select2.full.min.js') !!}
	<script>
		$('.datepicker').datepicker({
			format: 'yyyy-mm-dd'
		});

		$('.select2').select2();
	</script>
@endsection

