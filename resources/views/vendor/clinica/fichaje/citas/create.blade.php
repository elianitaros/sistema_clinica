@extends('adminlte::layout.index')

@section('title')
Citas
@endsection

@section('before_styles')

@endsection

@section('after_styles')
	{!! Html::style('vendor/adminlte/plugins/select2/select2.min.css') !!}
	{!! Html::style('vendor/adminlte/plugins/fullcalendar/fullcalendar.min.css') !!}
@endsection

@section('messages')
@endsection

@section('title-page')
Nueva Cita Medica
@endsection

@section('description-page')
Todo sobre citas medicas
@endsection

@section('content')

{{Form::open(['route' => 'fichaje.citas.store', 'method' => 'post', 'role' => 'form'])}}
@include('vendor.clinica.partial.errors')
<div class="box">
	<div class="box-header">
		<div class="col col-md-8">
			<h3 class="box-title"><i class="fa fa-calendar fa-2x "></i> NUEVO CITA</h3>
		</div>
		
		<div class="col col-md-4">
			<div class="form-group">
				<a href="{{ url('fichaje/pacientes/create') }}" class="btn btn-primary"><i> CREAR NUEVO PACIENTE</i></a>
				<a href="{{ url('horarios') }}" class="btn btn-info"><i> VER HORARIOS MEDICOS</i></a>
			</div>
		</div>
	</div>

	<div class="box-body">
			@if(Session::has('msg'))
				<div class="alert alert-warning">
					{{ Session::get('msg') }}
				</div>
				@endif

			<div class="col col-md-4">
				
				<div class="form-group">
					{{ Form::label('paciente', 'PACIENTE') }}
					<select name="paciente" id="paciente" class="form-control select2">
						@foreach($data as $row)
							<option value="{{ $row->id }}">{{ $row->people->ci }} - {{ strtoupper($row->people->name.' '.$row->people->firstname.' '.$row->people->lastname) }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					{{ Form::label('especialidad', 'ESPECIALIDAD') }}
					<select name="especialidad" id="especialidad" class="form-control select2">
						@foreach($especialidades as $esp)
							<option value="{{ $esp->id }}">{{ $esp->nombre }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					{{ Form::label('medico', 'MEDICOS DISPONIBLES') }}
					<select name="medico" id="medico" class="form-control select2">
					</select>
				</div>

				<div class="form-group">
					{{ Form::label('tipo_consulta', 'TIPO  CONSULTA') }}
					{{ Form::select('tipo_consulta', [ 'consulta' => 'CONSULTA' , 'reconsulta' => 'RECONSULTA' ], 'consulta', ['class' => 'form-control']) }}
				</div>


				<div class="form-group">
					{{ Form::label('fecha_consulta', 'FECHA CONSULTA') }}
					{{ Form::text('fecha_consulta', Carbon\Carbon::now()->toDateString(), [ 'class' => 'form-control datepicker', 'required' =>'true' ]) }}
				</div>

				<div class="form-group">
					{{ Form::label('hora_consulta', 'HORA CONSULTA') }}
					{{ Form::text('hora_consulta', Carbon\Carbon::now()->toTimeString(), [ 'id' => 'time', 'class' => 'form-control datetimepicker','required' =>'true' ]) }} 
				</div>

				<div class="form-group">
					{{-- Form::label('tiempo_consulta', 'TIEMPO CONSULTA') --}}
					{{-- Form::text('tiempo_consulta', $data->medico->horario->tiempo_consulta, ['class' => 'form-control text-uppercase', 'placeholder' => 'escriba segundo apellido']) --}} 
				</div>
				<div class="form-group">
					<a href="{{ url('fichaje/citas') }}" class="btn btn-danger"><i class="fa fa-times"> CANCELAR</i></a>
					<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> GUARDAR</button>
				</div>
			</div>
			<div class="col col-md-8">
				<div id="calendar"></div>
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
	{!! Html::script('vendor/adminlte/plugins/fullcalendar/jquery-ui.min.js') !!}
	{!! Html::script('vendor/adminlte/plugins/fullcalendar/moment.min.js') !!}
	{!! Html::script('vendor/adminlte/plugins/fullcalendar/fullcalendar.min.js') !!}
	<script>
		$('.select2').select2();
	</script>
	<script>
		var BASE_URL = "{{ url('/') }}/";
		$(document).ready(function() {
			var url = BASE_URL + 'fichaje/data/medicos/' + $('#especialidad').val();
			$('#medico').empty();
	       	$.get(url, function(data){
				for(var i = 0; data.length; i++){
					$('#medico').append('<option value="'+data[i].medico.id+'">'+data[i].medico.people.name+' '+data[i].medico.people.firstname+' '+data[i].medico.people.lastname+'</option>');
				}
			});
		});

		$(document).on('change', '#especialidad', function(){
			var url = BASE_URL + 'fichaje/data/medicos/' + $(this).val();
			$('#medico').empty();
	       	$.get(url, function(data){
				for(var i = 0; data.length; i++){
					$('#medico').append('<option value="'+data[i].medico.id+'">'+data[i].medico.people.name+' '+data[i].medico.people.firstname+' '+data[i].medico.people.lastname+'</option>');
				}
				
				/*if(data.length > 0){
					alert($('#medico').val());
					var url = BASE_URL + 'fichaje/data/citas/56'; + $('#medico').val();
					$('#calendar').fullCalendar('removeEvents');
					$('#calendar').fullCalendar('addEventSource', url);
					$('#calendar').fullCalendar('renderEvents');
				}*/
			});
		});

		/*$(document).on('change', '#medico', function(){
			var url = BASE_URL + 'fichaje/data/citas/' + $(this).val();
			$('#calendar').fullCalendar('removeEvents');
			$('#calendar').fullCalendar('addEventSource', url);
			$('#calendar').fullCalendar('renderEvents');
		});*/
	</script>
	<script>
	$(function () {

    /* initialize the calendar*/
    var date = new Date();
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear();
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'hoy',
        month: 'mes',
        week: 'semana',
        day: 'dia'
      },
      //Random default events
      events: BASE_URL + 'fichaje/data/citas/all',
      selectable: true,
      editable: true,
      droppable: false, // this allows things to be dropped onto the calendar !!!
      select: function(start, end, jsEvent, view) {
         $('#fecha_consulta').val(moment(start).format('YYYY-MM-DD')+"");
    	}
    });
  });
</script>
@endsection

