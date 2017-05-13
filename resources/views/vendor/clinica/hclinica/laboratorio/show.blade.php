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
          <div class="bg-navy-active color-palette"><span>CENTRO DE ESPECIALIDADES MEDICAS SAN VALENTIN<br>SOLICITUD DE ESTUDIO DE LABORATORIO</span></div>     
          <div class="tab-pane">
            <thead>
              <tr>
                  <th style="width: 30px" class="bg-gray color-palette">NOMBRES Y APELLIDOS</th><td style="width: 100px">{{ $lab->paciente->people->name }} {{$lab->paciente->people->firstname }} {{$lab->paciente->people->lastname }}</td>
                <th style="width: 10px" class="bg-gray color-palette">EDAD</th><td style="width: 100px"></td>
              </tr>
            </thead>
            <thead>
              <tr style="width: 20px">
                <th style="width: 10px" class="bg-gray color-palette">FECHA DE REGISTRO</th><td style="width: 100px">{{ $lab->created_at }}</td>
                <th style="width: 10px" class="bg-gray color-palette">GENERO</th><td style="width: 100px">{{ $lab->paciente->genero }}</td>
              </tr>
            </thead>
            <thead>
              <tr>
                  <th style="width: 10px" class="bg-gray color-palette">DIAGNOSTICO PRESUNTIVO</th><td style="width: 100px">{{ $lab->diagnostico }}</td>            
                  <th></th><td></td>            
              </tr>
            </thead>
          </div>             
        </table>

        <table class="table table-bordered table-hover">
        <div class="tab-pane">
          <thead>
            <tr>
              <th class="bg-gray-active color-palette" style="width: 100px">HEMATOLOGIA</th>
              <th class="bg-gray-active color-palette" style="width: 100px">BIOQUIMICA</th>
              <th class="bg-gray-active color-palette" style="width: 100px">SEROLOGIA</th>
            </tr>              
          </thead>
          
          <tbody>
           
              <tr>
                <td>  <?php $hola = explode(",", $lab->hematologia);
                        $tam = min( count($hola), 12); 
                        for($i=0; $i < $tam; $i++)
                        {
                            echo $hola[$i];
                            echo "<br>"; 
                        } ?> </td>                 
                <td>
                  <?php $h = explode(",", $lab->bioquimica);
                        $tam = min( count($h), 28); 
                        for($i=0; $i < $tam; $i++)
                        {
                            echo $h[$i];
                            echo "<br>"; 
                        } ?> </td>
                </td>
                <td>
                   <?php $h = explode(",", $lab->serologia);
                        $tam = min( count($h), 15); 
                        for($i=0; $i < $tam; $i++)
                        {
                            echo $h[$i];
                            echo "<br>"; 
                        } ?> </td>
                </td>
              </tr>    
          </tbody>

          <thead>
            <tr>
              <th class="bg-gray-active color-palette" style="width: 100px">HORMONAS</th>
              <th class="bg-gray-active color-palette" style="width: 100px">ORINA</th>
              <th class="bg-gray-active color-palette" style="width: 100px">MICROBIOLOGIA</th>
            </tr>
          </thead>

          <tbody>
              <tr>
                <td>
                  <?php $h = explode(",", $lab->hormonas);
                        $tam = min( count($h), 17 ); 
                        for($i=0; $i < $tam; $i++)
                        {
                            echo $h[$i];
                            echo "<br>"; 
                        } ?> </td>
                </td>
                <td>
                  <?php $h = explode(",", $lab->orina);
                        $tam = min( count($h), 3); 
                        for($i=0; $i < $tam; $i++)
                        {
                            echo $h[$i];
                            echo "<br>"; 
                        } ?> </td>
                </td>
                <td>
                  <?php $h = explode(",", $lab->microbiologia);
                        $tam = min( count($h), 7); 
                        for($i=0; $i < $tam; $i++)
                        {
                            echo $h[$i];
                            echo "<br>"; 
                        } ?> </td></td>
              </tr>    
          </tbody>

          <thead>
            <tr>
              <th class="bg-gray-active color-palette" style="width: 5px">MARCADORES</th>
              <th class="bg-gray-active color-palette" style="width: 100px">TINCION DE GRAM</th>
              <th class="bg-gray-active color-palette" style="width: 100px">CITOLOGIA</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <td>
                  <?php $h = explode(",", $lab->marcadores);
                        $tam = min( count($h), 1); 
                        for($i=0; $i < $tam; $i++)
                        {
                            echo $h[$i];
                            echo "<br>"; 
                        } ?> </td>
                </td>
                <td>{{ $lab->tincion_gram }}</td>
                <td>
                  <?php $h = explode(",", $lab->citologia);
                        $tam = min( count($h), 0); 
                        for($i=0; $i < $tam; $i++)
                        {
                            echo $h[$i];
                            echo "<br>"; 
                        } ?> </td>
                </td>
              </tr>    
          </tbody>
          
          <thead>
            <tr>
              <th class="bg-gray-active color-palette" style="width: 100px"></th>
              <th class="bg-gray-active color-palette" style="width: 100px"></th>
              <th class="bg-gray-active color-palette" style="width: 100px">PREOPERATORIO</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <td></td>
                <td></td>
                <td>
                  <?php $h = explode(",", $lab->preoperatorio);
                        $tam = min( count($h), 0); 
                        for($i=0; $i < $tam; $i++)
                        {
                            echo $h[$i];
                            echo "<br>"; 
                        } ?> </td>
                </td>
              </tr>    
          </tbody>
          
          <thead>
            <tr>
              <th class="bg-gray-active color-palette" style="width: 100px"></th>
              <th class="bg-gray-active color-palette" style="width: 100px"></th>
              <th class="bg-gray-active color-palette" style="width: 100px">PARASITOLOGIA</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <td></td>
                <td></td>
                <td>
                  <?php $h = explode(",", $lab->parasitologia);
                        $tam = min( count($h), 4); 
                        for($i=0; $i < $tam; $i++)
                        {
                            echo $h[$i];
                            echo "<br>"; 
                        } ?> </td>
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

