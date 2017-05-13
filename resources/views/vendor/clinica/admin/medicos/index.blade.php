@extends('adminlte::layout.index')

@section('title')
Medicos
@endsection

@section('before_styles')
@endsection

@section('after_styles')
	{!! Html::style('vendor/adminlte/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection

@section('messages')
@endsection

@section('title-page')
Medicos
@endsection

@section('description-page')
Lista de Medicos
@endsection

@section('content')
<div class="box">
	<div class="box-header">
		<h3 class="box-title"><i class="fa fa-user-md fa-2x"></i> LISTA DE MEDICOS</h3>
	</div>
	<div class="box-body">
		<table id="medicos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>NOMBRES & APELLIDOS</th>
					<th>USUARIO</th>
					<th>ESTADO</th>
					<th>ESPECIALIDAD</th>
					<th>---</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $row)
				<tr>
					<td><a href="{{ route('admin.medicos.show', Crypt::encrypt($row->id)) }}" class="text-capitalize">{{ $row->people->name }} {{ $row->people->firstname }} {{ $row->people->lastname }}</a></td>
					<td>{{ $row->username }}</td>
					<td>{{ $row->estado }}</td>
					<td><label class="label" style="background-color:{{ $row->especialidad->color }}">{{ $row->especialidad->nombre }}</label> </td>
					<td>
						<a href="{{ url('admin/resetear/'.$row->id) }}" class="btn btn-primary btn-xs" style="float:left"><i class="fa fa-pencil">Restablecer contraseña</i></a>
						<a href="{{ route('admin.medicos.edit', Crypt::encrypt($row->id)) }}" class="btn btn-warning btn-xs" style="float:left"><i class="fa fa-pencil">Editar</i></a>
						{{ Form::open(['route' => ['admin.medicos.destroy', Crypt::encrypt($row->id)], 'method' => 'delete', 'role' => 'form', 'style' => 'float:left']) }}
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
    $('#medicos').DataTable( {
    language: {
    	url: "{{ asset('vendor/adminlte/plugins/datatables/es.json')}}"
    }
	});
  });
</script>
@endsection

