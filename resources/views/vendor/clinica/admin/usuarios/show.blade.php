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
Lista de Pacientes
@endsection

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-users"></i>PERFIL DE USUARIO</h3>
    </div>
    <div class="box-body">
    	<section class="content">
			<div class="row">
				<div class="col col-lg-3 col-md-3 col-xs-6">
					<img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
					<h3 class="profile-username text-center">
		              {{ $data->people->name }} {{ $data->people->firstname}}  {{$data->people->lastname }}  
		            </h3>
		            <p class="text-muted text-center">{{ $data->type }}</p>
				</div>

				<div class="col col-lg-3 col-md-3 col-xs-6">
					<ul class="list-group list-group-unbordered">
		                <li class="list-group-item">
		                  <b>Nombre de usuario</b> <a class="pull-right">{{ $data->username }}</a>
		                </li>
		                <li class="list-group-item">
		                  <b>E-mail</b> <a class="pull-right">{{ $data->email}}</a>
		                </li>
		                <li class="list-group-item">
		                  <b>Cedula de Identidad</b> <a class="pull-right">{{ $data->people->ci}}</a>
		                </li>
		            </ul>
		            <a href="{{url('admin/usuarios')}}" class="btn btn-primary btn-block"><b></b>SALIR</a>
				</div>       
    		</div>
    	</section>
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

