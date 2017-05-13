@extends('adminlte::layout.index')

@section('title')
HC
@endsection

@section('before_styles')
@endsection

@section('after_styles')
    {!! Html::style('vendor/adminlte/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection

@section('messages')
@endsection

@section('title-page')
HISTORIAS CLINICAS
@endsection

@section('description-page')
historia clinica del paciente
@endsection

@section('content')
<style>
    .table-bordered
    {
        border:  solid; 
        border-color: #CCCCFF ;
    }
    .thead.tr.th{
      background-color : #CCCCFF; 
    }
</style>
<div class="box">
    <div class="tab-pane">
    <div class="box-body">
      <div class="col-xs-12">
        <table class="table table-bordered table-hover">
          <div class="bg-navy-active color-palette"><span>CENTRO DE ESPECIALIDADES MEDICAS SAN VALENTIN<br>RECETA MEDICA</span></div>     
          <div class="tab-pane">
            <thead>
              <tr>
                  <th style="width: 30px" class="bg-gray color-palette">NOMBRES Y APELLIDOS</th><td style="width: 100px">{{ $rec->paciente->people->name }} {{$rec->paciente->people->firstname }} {{$rec->hc->paciente->people->lastname }}</td>
                <th style="width: 10px" class="bg-gray color-palette">EDAD</th><td style="width: 100px"></td>
              </tr>
            </thead>
            <thead>
              <tr style="width: 20px">
                <th style="width: 10px" class="bg-gray color-palette">FECHA DE REGISTRO</th><td style="width: 100px">{{ $rec->created_at }}</td>
                <th style="width: 10px" class="bg-gray color-palette">GENERO</th><td style="width: 100px">{{ $rec->paciente->genero }}</td>
              </tr>
            </thead>
          </div>             
        </table>

        <table class="table table-bordered table-hover">
        <div class="tab-pane">
          <thead>
            <tr>
              <th class="bg-gray-active color-palette" style="width: 100px">MEDICAMENTOS</th>
            </tr>              
          </thead>
          
          <tbody> 

            <td>CHUPON APPLE</td>
            <td>PLATO VASO</td>
            <td>HIDRODERM</td>
            <td>AMOXIMIL 10% </td>
            <td>ESCABIOL HEMORSAN SUP</td> 
            <td>JABON JHONSON </td>
          </tbody>

         
          <thead>
            <tr>
              <th class="bg-gray-active color-palette" style="width: 100px">PRESCRIPCION</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <td></td>
                <td></td>
                <td>
                  {{ $rec->descripcion }}
                </td>
              </tr>    
          </tbody>
        </div>             
      </table>  
    </div>
    
    <div class="col col-md-4">
      <div class="form-group">
        <a class="btn btn-primary btn-xs-2" href="{{ URL::previous() }}">ATRAS</a>
      </div>
    </div>
    
  </div>
</div>


@endsection

@section('before_scripts')
@endsection

@section('after_scripts')
{!! Html::script('vendor/adminlte/plugins/datatables/jquery.dataTables.min.js') !!}
{!! Html::script('vendor/adminlte/plugins/datatables/dataTables.bootstrap.min.js') !!}
@endsection

