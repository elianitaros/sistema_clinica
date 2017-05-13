@extends('adminlte::layout.index')

@section('title')
Usuarios
@endsection

@section('before_styles')
@endsection

@section('after_styles')
	{!! Html::style('vendor/adminlte/dist/css/AdminLTE.min.css') !!}
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
          <th>PACIENTE</th>
          <th>TIPO DE CONSULTA</th>
          <th>ESTADO</th>
          <th>---</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $row)
        <tr>
          <td>
            <a href="{{ route('hclinica.hc.create', Crypt::encrypt($row->id)) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil">Editar</i></a>
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
{!! Html::script('vendor/adminlte/dist/js/app.min.js') !!}
<script>
  $(function () {
    $("#hc").DataTable();
  });
</script>
@endsection

