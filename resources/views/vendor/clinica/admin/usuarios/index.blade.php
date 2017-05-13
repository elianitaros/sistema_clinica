@extends('adminlte::layout.index')

@section('title')
Usuarios
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
Lista de Usuarios
@endsection

@section('content')
<div class="box">
	<div class="box-header">
		<h3 class="box-title"><i class="fa fa-users"></i> LISTA DE USUARIOS</h3>
	</div>
	<div class="box-body">
		<table id="usuarios" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>NOMBRES & APELLIDOS</th>
					<th>USUARIO</th>
					<th>ROL</th>
					<th>ESTADO</th>
					<th>---</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $row)
				<tr>
					<td><a href="{{ route('admin.usuarios.show', Crypt::encrypt($row->id)) }}" class="text-capitalize">{{ $row->people->name }} {{ $row->people->firstname }} {{ $row->people->lastame }}</a></td>		
					<td>{{ $row->username }}</td>
					<td>{{ $row->type }}</td>
					<td>{{ $row->estado }}</td>
					<td>
						<a href="{{ url('admin/resetear/'.$row->id) }}" class="btn btn-primary btn-xs" style="float:left"><i class="fa fa-pencil">Restablecer contraseña</i></a>
						<a href="{{ route('admin.usuarios.edit', Crypt::encrypt($row->id)) }}" class="btn btn-warning btn-xs" style="float:left"><i class="fa fa-pencil">Editar</i></a>
						{{ Form::open(['route' => ['admin.usuarios.destroy', Crypt::encrypt($row->id)], 'method' => 'delete', 'role' => 'form', 'style' => 'float:left']) }}
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
    $('#usuarios').DataTable( {
    language: {
    	url: "{{ asset('vendor/adminlte/plugins/datatables/es.json')}}"
    }
	});
  });

  
</script>
@endsection

