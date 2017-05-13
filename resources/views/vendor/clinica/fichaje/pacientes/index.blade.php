@extends('adminlte::layout.index')

@section('title')
Pacientes
@endsection

@section('before_styles')
@endsection

@section('after_styles')
	{!! Html::style('vendor/adminlte/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection

@section('messages')
@endsection

@section('title-page')
Usuarios
@endsection

@section('description-page')
Lista de Pacientes
@endsection

@section('content')
<div class="box">
	<div class="box-header">
		<h3 class="box-title"><i class="fa fa-users"></i> LISTA DE PACIENTES</h3>
	</div>
	<div class="box-body">
		<table id="pacientes" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>NOMBRES & APELLIDOS</th>
					<th>PROCEDENCIA</th>
					<th>FECHA NACIMIENTO</th>
					<th>GENERO</th>
					<th>ESTADO</th>
					<th>---</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $row)
				<tr>
					<td class="text-capitalize">{{ $row->people->name  }} {{ $row->people->firstname }} {{ $row->people->lastname }}</td>
					<td class="text-capitalize">{{ $row->origen }}</td>
					<td>{{ $row->fecha_nac }}</td>
					<td>{{ $row->genero }}</td>
					<td>{{ $row->estado }}</td>
					<td>
						<a href="{{ route('fichaje.pacientes.edit', Crypt::encrypt($row->id)) }}" class="btn btn-warning btn-xs" style="float:left"><i class="fa fa-pencil">Editar</i></a>
						{{ Form::open(['route' => ['fichaje.pacientes.destroy', Crypt::encrypt($row->id)], 'method' => 'delete', 'role' => 'form', 'style' => 'float:left']) }}
							<button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Eliminar</button>
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
    $('#pacientes').DataTable( {
    language: {
    	url: "{{ asset('vendor/adminlte/plugins/datatables/es.json')}}"
    }
	});
  });
</script>
@endsection

