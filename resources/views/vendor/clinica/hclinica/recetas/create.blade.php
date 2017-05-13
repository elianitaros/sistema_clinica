@extends('adminlte::layout.index')

@section('title')
Receta 
@endsection

@section('before_styles')
@endsection

@section('after_styles')
	{!! Html::style('vendor/adminlte/plugins/select2/select2.min.css') !!}
@endsection

@section('messages')
@endsection

@section('title-page')
Receta Medica
@endsection

@section('description-page')
Todo sobre HC
@endsection

@section('content')
{{Form::open(['url' => '/hclinica/recstore/'.Crypt::encrypt($hc->id), 'method' => 'post', 'role' => 'form'])}}
@include('vendor.clinica.partial.errors')
{{ Form::hidden('paciente', $paciente->id) }}
<div class="box">
	<div class="box-header">
		<h3 class="box-title"><i class="fa fa-users"></i>EMITIR RECETA MEDICA</h3>
	</div>
	<div class="box-body">
		<div>
	        <h4>Nombres: {{ $paciente->people->name }} || Genero: {{ $paciente->genero }} || Edad: <?php $date = explode('-', $paciente->fecha_nac) ?>  {{ Carbon\Carbon::createFromDate($date[0], $date[1], $date[2])->age }} años  </h4>
	    </div>
		<div class="row">
			<div class="col col-lg-12 col-md-12 col-xs-12">
				<div class="col-xs-12 ">
					<div class="bg-blue-active color-palette"><span>FARMACIA</span></div>
					<br>
				</div>
			</div>
		<div class="col col-lg-12 col-md-4 col-xs-12">
				<div class="form-group">
					{{ Form::label('producto', 'MEDICAMENTO') }}
					<select name="productos[]" id="productos"  class="form-control select2" multiple="multiple">
						@foreach($productos as $row)
							<option  value="{{ $row->id }}">{{ $row->nombre_generico }}</option>							 
						@endforeach
					</select>
				</div>
			</div>
		</div>                              
	          	<div class="col col-lg-12 col-md-12 col-xs-12  ">
	            <div class="col-xs-12 ">
	              <div class="form-group">
	                {{ Form::label('descripcion', 'MEDICAMENTO Y DESCRIPCION') }}
	                {{ Form::textarea('descripcion', old('descripcion'), ['class' => 'form-control text-uppercase','row' => '6' ,'required' => 'true', 'minlength' => '2']) }}
	              </div>                              
	            </div>
	        
		</div>	

		<div class="col col-lg-12 col-md-12 col-xs-12">
			<div class="form-group">
				<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> GUARDAR</button>
				<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> IMPRIMIR</button>
			<div>
		</div>
	</div>
</div>
{{ Form::close() }}

@endsection

@section('before_scripts')

@endsection

@section('after_scripts')
	{!! Html::script('vendor/adminlte/plugins/select2/select2.full.min.js') !!}
	<script>
		$('.select2').select2();
	</script>
@endsection

