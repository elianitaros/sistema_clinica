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

	<h2 class="page-header">Registro de Historia Clinica del Paciente</h2>
      <div>
        <h4>{{ $data->people->name }} {{ $data->genero }} <?php $date = explode('-', $data->fecha_nac) ?>  {{ Carbon\Carbon::createFromDate($date[0], $date[1], $date[2])->age }} años  </h4>

      </div>
      <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active">	
                <li><a href="#" data-toggle="tab"><i class="fa fa-file-text-o fa-2x" aria-hidden="true"></i> CONSULTA</a></li>		
              	<li><a href="{{url('hclinica/antcreate/'.$data->id)}}"><i class="fa fa-file-text-o fa-2x"></i> ANTECEDENTES</a></li>
                <li><a href="#tab_3" data-toggle="tab"><i class="fa fa-folder-open fa-2x" aria-hidden="true"></i> VER CONSULTAS</a></li>
	              <li><a href="" data-toggle="tab"><i class="fa fa-medkit fa-2x"></i> RECETAS MEDICAS</a></li>
	              <li><a href="#tab_3" data-toggle="tab"><i class="fa fa-file-image-o fa-2x"></i> EXAMENES COMPLEMENTARIOS</a></li>
                <li><a href="#tab_3" data-toggle="tab"><i class="fa fa-flask fa-2x"></i> LABORATORIOS</a></li>
              </li>

		</div>

@if($antecedente > 0)    

{{Form::open([ 'url' => '/hclinica/store/'.Crypt::encrypt($data->id), 'method' => 'post', 'role' => 'form'])}}
@include('vendor.clinica.partial.errors')

<div id="collapseOne" class="panel-collapse collapse in">
  <div class="box-body">
    <div class="row">
      <div class="col col-lg-12 col-md-12 col-xs-12">
       <div class="form-group">
                {{ Form::label('subjetivo', 'SUBJETIVO') }}
                {{ Form::text('subjetivo', old('subjetivo'), ['class' => 'form-control text-uppercase', 'placeholder' => 'escriba ']) }}
              </div>

              <div class="form-group">
                {{ Form::label('objetivo', 'OBJETIVO') }}
                {{ Form::text('objetivo', old('objetivo'), ['class' => 'form-control text-uppercase', 'placeholder' => 'escriba primer apellido']) }}
              </div>

              <div class="form-group">
                {{ Form::label('analisis', 'ANALISIS') }}
                {{ Form::text('analisis', old('analisis'), ['class' => 'form-control text-uppercase', 'placeholder' => 'escriba']) }} 
              </div>

              <div class="form-group">
                {{ Form::label('plan', 'PLAN') }}
                {{ Form::text('plan', old('plan'), ['class' => 'form-control', 'placeholder' => 'escriba ']) }}
              </div>
              <div class="col col-lg-12 col-md-12 col-xs-12">
                <div class="form-group">
                  <a href="{{ url('admin/usuarios') }}" class="btn btn-danger"><i class="fa fa-times"> CANCELAR</i></a>
                  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> GUARDAR</button>
                </div>
              </div>
      </div>
     </div>
  </div>
</div>
@else
<div class="alert alert-info">
        <h4>INFORMACION</h4>No existen antecedentes del paciente.
        <a href="{{ url('hclinica/antcreate/'.crypt::encrypt($data->id)) }}" class="btn btn-primary">Crear antecendete</a>
</div>
@endif
		
@endsection

@section('before_scripts')
@endsection

@section('after_scripts')
{!! Html::script('vendor/adminlte/plugins/datatables/jquery.dataTables.min.js') !!}
{!! Html::script('vendor/adminlte/plugins/datatables/dataTables.bootstrap.min.js') !!}
{!! Html::script('vendor/adminlte/dist/js/app.min.js') !!}
<script>
  $(function () {
    $("#usuarios").DataTable();
  });
</script>
@endsection

