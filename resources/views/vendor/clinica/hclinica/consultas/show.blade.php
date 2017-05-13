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
        border-color: #0B0B3B;
    }
</style>
<div class="box">
    <div class="tab-pane">
    <div class= "box-header">
       <div class="col col-md-4">
          <div class="form-group">
            <a class="btn btn-primary btn-xs-6" href="{{ URL::previous() }}">ATRAS</a>
          </div>
        </div>
    </div>

    <div class="box-body">
        <table id="antecedentes" class="table table-bordered table-hover">
        <div class="bg-navy-active color-palette"><span>HISTORIA CLINICA DEL PACIENTE</span></div>     
        <div class="tab-pane" id="hc">
          <thead>
            <tr>
              <th class="bg-navy disabled color-palette">N° DE HISTORIA CLINICA</th>
              <th class="bg-light-blue color-palette">FECHA DE REGISTRO</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <td>{{ $hc->paciente->people->ci }}</td>
                <td>{{ $hc->created_at }} </td>
              </tr>    
          </tbody>
        </div>             
        </table>

        <table id="antecedentes" class="table table-bordered table-hover">
        <div class="tab-pane" id="hc">
          <thead>
            <tr style="width: 20px">
              <th style="width: 10px" class="bg-light-blue color-palette">NOMBRES Y APELLIDOS</th><td style="width: 200px">{{ $hc->paciente->people->name }}</td>
            </tr>

            <tr style="width: 10px">
              
            </tr>
          </thead>
          <tbody>
              <tr>
              </tr>    
          </tbody>
        </div>             
        </table>

        <table id="antecedentes" class="table table-bordered table-hover">
        <div class="tab-pane" id="hc">
          <thead>
            <tr style="width: 20px">
              <th style="width: 30px" class="bg-light-blue color-palette">FECHA DE NACIMIENTO</th><td style="width: 100px">{{ $hc->paciente->fecha_nac }}</td>
              <th style="width: 10px" class="bg-light-blue color-palette">EDAD</th><td style="width: 100px">{{ $hc->paciente->people->name }}</td>
              <th style="width: 10px" class="bg-light-blue color-palette">GENERO</th><td style="width: 100px">{{ $hc->paciente->genero }}</td>
            </tr>
          </thead>
        </div>             
        </table>

        <table id="antecedentes" class="table table-bordered table-hover">
        <div class="tab-pane" id="hc">
          <thead>
            <tr style="width: 20px">
              <th style="width: 10px" class="bg-light-blue color-palette">PROCEDENCIA</th><td style="width: 100px">{{ $hc->paciente->origen }}</td>
              <th style="width: 10px" class="bg-light-blue color-palette">ESTADO CIVIL</th><td style="width: 100px">{{ $hc->paciente->estado_civil}}</td>
              <th style="width: 10px" class="bg-light-blue color-palette">OCUPACION ACTUAL</th><td style="width: 100px">{{ $hc->paciente->ocupacion }}</td>
            </tr>
          </thead>
        </div>             
        </table>

        <table id="antecedentes" class="table table-bordered table-hover">
        <div class="tab-pane" id="hc">
          <thead>
            <tr style="width: 20px">
              <th style="width: 40px" class="bg-light-blue color-palette">DIRECCION</th><td style="width: 200px">{{ $hc->paciente->direccion }}</td>
              <th style="width: 10px" class="bg-light-blue color-palette">TELEFONO</th><td style="width: 100px">{{ $hc->paciente->telef }}</td>
              <th style="width: 10px" class="bg-light-blue color-palette">CELULAR</th><td style="width: 100px">{{ $hc->paciente->celular }}</td>
            </tr>
          </thead>
        </div>             
        </table>

        <table id="antecedentes" class="table table-bordered table-hover">
        <div class="tab-pane" id="hc">
          <thead>
            <tr style="width: 20px">
              <th style="width: 40px" class="bg-light-blue color-palette">EN CASO DE EMERGENCIA</th><td style="width: 200px">{{ $hc->paciente->caso_emergencia }}</td>
              <th style="width: 10px" class="bg-light-blue color-palette">TELEFONO EMERGENCIA</th><td style="width: 100px">{{ $hc->paciente->telf_opcional }}</td>
            </tr>
          </thead>
        </div>             
        </table>
        

        <table id="antecedentes" class="table table-bordered table-hover">
        <div class="tab-pane" id="hc">
          <thead>
            <tr style="width: 20px">
              <th style="width: 40px" class="bg-light-blue color-palette">PESO</th><td style="width: 200px">{{ $hc->peso}}</td>
              <th style="width: 10px" class="bg-light-blue color-palette">TALLA</th><td style="width: 100px">{{ $hc->talla}}</td>
            </tr>
          </thead>

          <thead>
            <tr style="width: 20px">
              <th style="width: 40px" class="bg-light-blue color-palette">PRESION</th><td style="width: 200px">{{ $hc->presion}}</td>
              <th style="width: 10px" class="bg-light-blue color-palette">TEMPERATURA</th><td style="width: 100px">{{ $hc->temperatura}} {{ $hc->grados}}</td>
            </tr>
          </thead>
        </div>             
        </table>
        

        <table id="antecedentes" class="table table-bordered table-hover">
        <div class="tab-pane" id="hc">
          <thead>
            <tr>
              <th class="bg-navy-active color-palette">SUBJETIVO</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <td>{{ $hc->subjetivo }}</td>
              </tr>    
          </tbody>
        </div>             
        </table>        
        
        <table id="antecedentes" class="table table-bordered table-hover">
        <div class="tab-pane" id="hc">
          <thead>
            <tr>
              <th class="bg-navy-active color-palette">OBJETIVO</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <td>{{ $hc->objetivo }}</td>
              </tr>    
          </tbody>
        </div>             
        </table>        
        
        <table id="antecedentes" class="table table-bordered table-hover">
        <div class="tab-pane" id="hc">
          <thead>
            <tr>
              <th class="bg-navy-active color-palette">ANALISIS</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <td>{{ $hc->analisis }}</td>
              </tr>    
          </tbody>
        </div>             
        </table>        

        <table id="antecedentes" class="table table-bordered table-hover">
        <div class="tab-pane" id="hc">
          <thead>
            <tr>
              <th class="bg-navy-active color-palette">PLAN</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <td>{{ $hc->plan }}</td>
              </tr>    
          </tbody>
        </div>             
        </table>        

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

