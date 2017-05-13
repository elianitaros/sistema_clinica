@extends('adminlte::layout.index')

@section('title')
Solicitud de examen complementario
@endsection

@section('before_styles')
@endsection

@section('after_styles')
	{!! Html::style('vendor/adminlte/plugins/datepicker/datepicker3.css') !!}
@endsection

@section('messages')
@endsection

@section('title-page')
Examen Complementario
@endsection

@section('description-page')
Todo sobre pacientes
@endsection

@section('content')

{{Form::open(['url' => '/hclinica/exastore/'.Crypt::encrypt($paciente->id), 'method' => 'post', 'role' => 'form'])}}
@include('vendor.clinica.partial.errors')
<div class="box">
	<div class="box-header">
		<h3 class="box-title"><i class="fa fa-users"></i>SOLICITUD DE EXAMEN COMPLEMENTARIO</h3>
	</div>
	<div class="box-body">
		<div>
	        <h4>Nombres: {{ $paciente->people->name }} || Genero: {{ $paciente->genero }} || Edad: <?php $date = explode('-', $paciente->fecha_nac) ?>  {{ Carbon\Carbon::createFromDate($date[0], $date[1], $date[2])->age }} años  </h4>
	    </div>
		<div class="row">
		<div class="col col-lg-12 col-md-6 col-xs-12">
			
						<div class="col col-lg-4 col-md-12 col-xs-4">              
							  <div class="form-group">
	                              {{ Form::label('descripcion', ' DESCRIBA') }}
	                              <textarea class="form-control" rows="6" name= "descripcion"  placeholder="descripcion" ></textarea>
	                           </div>    
						</div>

					

					<div class="col col-lg-12 col-md-12 col-xs-12">
						<div class="form-group">
							<a class="btn btn-info" href="{{ URL::previous() }}">back</a>

								<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> GUARDAR</button>
						<div>
					</div>
				</div>
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
	{!! Html::script('vendor/adminlte/plugins/select2/select2.full.min.js') !!}
	{!! Html::script('vendor/adminlte/plugins/datepicker/bootstrap-datepicker.js') !!}
	<script>
		$('.datepicker').datepicker({
			format: 'yyyy-mm-dd'
		});

		

	</script>
@endsection

