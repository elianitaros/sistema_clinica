@extends('adminlte::layout.index')

@section('title')
Especialidades
@endsection

@section('before_styles')
@endsection

@section('after_styles')
	{!! Html::style('vendor/adminlte/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection

@section('messages')
@endsection

@section('title-page')
Especialidades
@endsection

@section('description-page')
Lista de Especialidades
@endsection

@section('content')
<div class="box">
	<div class="box-header">
		<h3 class="box-title"><i class="fa fa-heartbeat fa-2x"></i> LISTA DE ESPECIALIDADES</h3>
	</div>
	<div class="box-body">
		<table id="especialidades" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>NOMBRE ESPECIALIDAD</th>
					<th>ESTADO</th>
					<th>---</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $row)
				<tr>
					<td><label class="label" style="background-color:{{ $row->color }}">{{ $row->nombre }}</label> </td>
					<td> {{ $row->estado}}</td>
					<td>
						<a href="{{ route('admin.especialidades.edit', Crypt::encrypt($row->id)) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"> Editar</i></a>
						
                        {!! Form::open(['method' => 'DELETE','route' => ['admin.especialidades.destroy', Crypt::encrypt($row->id)],'style'=>'display:inline']) !!}
                        {{ Form::open(['route' => ['admin.especialidades.destroy', Crypt::encrypt($row->id)], 'method' => 'delete', 'role' => 'form', 'style' => 'float:left']) }}
							<button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Eliminar</button>
						{{ Form::close() }}

                        {!! Form::close() !!}
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
    $('#especialidades').DataTable( {
    language: {
    	url: "{{ asset('vendor/adminlte/plugins/datatables/es.json')}}"
    }
	});
  });
</script>
@endsection

