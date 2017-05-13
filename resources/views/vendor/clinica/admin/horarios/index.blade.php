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
		<h3 class="box-title"><i class="fa fa-calendar fa-2x"></i> LISTA DE HORARIOS MEDICOS</h3>
	</div>
	<div class="box-body">
		<table id="horarios" class="table table-bordered table-hover">
			<thead>
				<tr>
					
					<th>MEDICO</th>
					<th>TURNO</th>
					<th>HORAS DE CONSULTAS</th>
					<th>FECHA CALENDARIO </th>
					<th>---</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $row)
				<tr>
					<th class="text-capitalize">{{ $row->medico->people->name }} {{ $row->medico->people->firstname }} {{ $row->medico->people->lastname }}</th>
					<td>{{ $row->turno}} </td>
					<td>{{ $row->hora_i }} - {{ $row->hora_f }}</td>
					<td>{{ $row->started_at }} hasta {{ $row->finished_at }}</td>
					
					<td>
						<a href="{{ route('admin.horarios.edit', Crypt::encrypt($row->id)) }}" class="btn btn-warning btn-xs" style="float:left"><i class="fa fa-pencil">Editar</i></a>
						{{ Form::open(['route' => ['admin.horarios.destroy', Crypt::encrypt($row->id)], 'method' => 'delete', 'role' => 'form', 'style' => 'float:left']) }}
							{!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}

						{{ Form::close() }}
					</td>
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

