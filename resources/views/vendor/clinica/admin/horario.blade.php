@extends('adminlte::layout.index')

@section('title')
Horarios
@endsection

@section('before_styles')
@endsection

@section('after_styles')
	{!! Html::style('vendor/adminlte/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection

@section('messages')
@endsection

@section('title-page')
HORARIOS MEDICOS
@endsection

@section('description-page')
Lista de Horarios 
@endsection

@section('content')
<div class="box">
	<div class="box-header">
		<div class="col col-md-8">
			<h3 class="box-title"><i class="fa fa-calendar fa-2x "></i> LISTA DE HORARIOS MEDICOS</h3>
		</div>
		
		<div class="col col-md-4">
			<div class="form-group">
				<a class="btn btn-info" href="{{ URL::previous() }}">ATRAS</a>
			</div>
		</div>
	</div>

	<div class="box-body">
		<table id="horarios" class="table table-bordered table-hover">
			<thead>
				<tr>					
					<th>MEDICO</th>
					<th>TURNO</th>
					<th>HORAS DE CONSULTAS</th>
					<th>FECHA CALENDARIO </th>
					
				</tr>
			</thead>
			<tbody>
				@foreach($data as $row)
				<tr>
					<td>{{ $row->medico->people->name }} {{ $row->medico->people->firstname }} {{ $row->medico->people->lastname }}</td>
					<td>{{ $row->turno}} </td>
					<td>{{ $row->hora_i }} - {{ $row->hora_f }}</td>
					<td>{{ $row->started_at }} hasta {{ $row->finished_at }}</td>
		
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
    $('#horarios').DataTable( {
    language: {
    	url: "{{ asset('vendor/adminlte/plugins/datatables/es.json')}}"
    }
	});
  });
</script>
@endsection

