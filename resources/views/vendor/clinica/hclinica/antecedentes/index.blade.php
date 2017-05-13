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
					<th>anydcsd</th>
					<th>USUARI</th>
					<th>ROL</th>
					<th>ESTADO</th>
					<th>---</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $row)
				<tr>
					<td>{{ $row->antperinatal->numero_hijo }} </td>
					<td>{{ $row->rh }}</td>
					
					<td>
						<a href="{{ route('hclinicos.antecedentes.edit', $row->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil">Editar</i></a>
						<a href="{{ url('antecedentes/destroy/'.$row->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Eliminar</a>
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
    $("#usuarios").DataTable();
  });
</script>
@endsection

