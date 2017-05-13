@extends('adminlte::layout.index')
@section('title')
SOLICITUDES
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
SOLICITUD
@endsection

@section('description-page')
Lista de solicitud de examenes
@endsection

@section('content')
<div class="box">
	<div class="box-header">
    <h2 class="page-header">Registro de solicitud de examenes </h2>
    <div>
      <h4>{{ $data->people->name }} {{ $data->genero }} <?php $date = explode('-', $data->fecha_nac) ?>  {{ Carbon\Carbon::createFromDate($date[0], $date[1], $date[2])->age }} años  </h4>
    </div>
       <div class="form-group">
          <a href="{{url('hclinica/reccreate/'.Crypt::encrypt($data->id))}}" class="btn btn-sm btn-primary">EMITIR RECETA</a>
          <a href="{{url('hclinica/labcreate/'.Crypt::encrypt($data->id))}}" class="btn btn-sm btn-primary">LABORATORIO</a>
          <a href="{{url('hclinica/exacreate/'.Crypt::encrypt($data->id))}}" class="btn btn-sm btn-primary">EXAMEN COMPLEMENTARIO</a>
      </div>  
      <div class="form-group">

          <a href="{{url('hclinica/impreceta/'.Crypt::encrypt($data->id))}}" class="btn btn-sm btn-warning"><i class="fa fa-print"></i> RECETA</a>
          <a href="{{url('hclinica/implab/'.Crypt::encrypt($data->id))}}" class="btn btn-sm btn-warning"><i class="fa fa-print"></i> LABORATORIO</a>
          <a href="{{url('hclinica/impexa/'.Crypt::encrypt($data->id))}}" class="btn btn-sm btn-warning"><i class="fa fa-print"></i> EXAMEN COMPLEMENTARIO</a>
      </div>
      <a  href="{{url('hclinica/finalizar')}}" class="btn btn-sm btn-success">FINALIZAR CONSULTA</a>      
  </div>
</div>
@endsection
@section('before_scripts')
@endsection
@section('after_scripts')
{!! Html::script('vendor/adminlte/plugins/datatables/jquery.dataTables.min.js') !!}
{!! Html::script('vendor/adminlte/plugins/datatables/dataTables.bootstrap.min.js') !!}
{!! Html::script('vendor/adminlte/dist/js/app.min.js') !!}
@endsection

