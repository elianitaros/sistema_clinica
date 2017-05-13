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
        <h3 class="box-title"><i class="fa fa-users"></i>PACIENTE</h3>
    </div>
    <div class="box-body">
        <table id="pacientes" class="table table-bordered table-hover">
             <div class="form-group">
                            <strong>NOMBRES Y APELLIDOS:</strong>
                            {{ $data->people->name }} {{ $data->people->apellidop}}  {{$data->people->apellidom }}  
                        </div>


                        <div class="form-group">
                            <strong>DIRECCION:</strong>
                            {{ $data->direccion }}
                        </div>
                        

                        <div class="form-group">
                            <strong>FECHA DE NACIMIENTO:</strong>
                            {{ $data->fecha_nac }}
                        </div>

                        <div class="form-group">
                            <strong>EDAD:</strong>
                            <?php $date = explode('-', $data->fecha_nac) ?>
                            {{ Carbon\Carbon::createFromDate($date[0], $date[1], $date[2])->age }} años
                        </div>

                        <div class="form-group">
                            <strong>GENERO:</strong>
                            {{ $data->genero }}
                        </div>


                        <div class="form-group">
                            <strong>OCUPACION ACTUAL:</strong>
                            {{ $data->ocupacion }}
                        </div>


                        <div class="form-group">
                            <strong>ORIGEN DE NACIMIENTO:</strong>
                            {{ $data->origen }}
                        </div>


                        <div class="form-group">
                            <strong>N° DE TELEFONO: </strong>
                            {{ $data->telef }}
                        </div>


                        <div class="form-group">
                            <strong>N° DE CELULAR: </strong>
                            {{ $data->celular }}
                        </div>


                        <div class="form-group">
                            <strong>ESTADO CIVIL: </strong>
                            {{ $data->estado_civil }}
                        </div>

                        <div class="form-group">
                            <strong>EN CASO DE EMERGENCIA LLAMAR A:  </strong>
                            {{ $data->caso_emergencia }}
                        </div>


                        <div class="form-group">
                            <strong>NUMERO DE TELEFONO EN CASO DE EMERGENCIA: </strong>
                            {{ $data->telf_opciaonal }}
                        </div>
                    </div>

                </div>
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

