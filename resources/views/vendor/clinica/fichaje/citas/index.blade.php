@extends('adminlte::layout.index')

@section('title')
Citas
@endsection

@section('before_styles')
@endsection

@section('after_styles')
	{!! Html::style('vendor/adminlte/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection

@section('messages')
@endsection

@section('title-page')
Citas Medicas
@endsection

@section('description-page')
Todo sobre Citas Medicas
@endsection

@section('content')
<div class="box">
	<div class="box-header">
		<h3 class="box-title"><i class="fa fa-calendar fa-2x "></i> LISTA DE CITAS MEDICAS</h3>
	</div>
	<div class="box-body">
		<table id="citas" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>N° CONSULTA</th>
					<th>PACIENTE</th>
					<th>ESPECIALIDAD</th>
					<th>MEDICO</th>
					<th>FECHA & HORA</th>
					<th>ESTADO</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $row)
				<tr>
					<td>{{ $row->id }}</td>
					<td class="text-capitalize">{{ $row->paciente->people->name }} {{ $row->paciente->people->firstname }} {{ $row->paciente->people->lastname }}</td>
					<td><label class="label" style="background-color:{{ $row->medico->especialidad->color }}">{{ $row->medico->especialidad->nombre }}</label></td>
					<td class="text-capitalize">{{ $row->medico->people->name }} {{ $row->medico->people->firstname }} {{ $row->medico->people->lastname }}</td>
					<td>{{ $row->fecha_consulta }} {{ $row->hora_consulta }}</td>					
					<td>{{ $row->estado }}</td>
					
				</tr>
				@endforeach
			</tbody>
        </table>
	</div>
</div>
@endsection

@section('before_scripts')
@endsection

@section('after_scripts')
{!! Html::script('vendor/adminlte/plugins/datatables/jquery.dataTables.min.js') !!}
{!! Html::script('vendor/adminlte/plugins/datatables/dataTables.bootstrap.min.js') !!}
<script>
  $(function () {
    $('#citas').DataTable( {
    language: {
    	url: "{{ asset('vendor/adminlte/plugins/datatables/es.json')}}"
    }
	});
  });

</script>
@endsection

