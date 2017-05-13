@extends('adminlte::layout.index')
@section('title')
hc
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
hc
@endsection

@section('description-page')

@endsection

@section('content')

<style>
  .table.table-bordered.table-hover
  {
    border:  solid; 
    border-color: #0B0B3B;
  }
 
  .tab-content.ta
  {
    border:  solid; 
    border-color: #0B0B3B;
  }

  
</style>

<div class="box">
	<div class="box-header">
    <div class= "col-xs-12" style="background-color : #A9D0F5; font-family : Verdana,">
      <div class= "col-xs-8">
        <h2 class="page-header" style="font-family :Verdana; ">REGISTRO  CLINICO DEL PACIENTE </h2>    
      </div>        
        <div class= "col-xs-2">
          <h4 > HORA: </h4>    
        </div>
        <div class= " col-xs-2">
          @include('vendor.clinica.hclinica.consultas.reloj')   
      </div>  
      </div>
    
      <div class= "col-xs-12">
        <div class="row">
          <div class= "col-xs-3"  style="background-color :#CEE3F6; font-family : Verdana," >
            <h4>NOMBRES Y APELLIDOS      :</h4> 
          </div>  
        
          <div class= "col-xs-4" style="background-color :#E0ECF8; font-family : Verdana," >
            <h4 class="text-capitalize"> {{ $data->people->name }} {{ $data->people->firstname }}  {{$data->people->lastname}}</h4>    
          </div>
          <div class= "col-xs-2"  style="background-color :#CEE3F6; font-family : Verdana," >
            <h4>GENERO      :</h4> 
          </div>
          <div class= "col-xs-3" style="background-color :#E0ECF8; font-family : Verdana," >
            <h4> {{ $data->genero }}</h4>    
          </div>
        </div>           
      </div>

      <div class= "col-xs-12">
        <div class="row">
          <div class= "col-xs-3"  style="background-color :#CEE3F6; font-family : Verdana," >
            <h4>EDAD      :</h4> 
          </div>  
        
          <div class= "col-xs-3" style="background-color :#E0ECF8; font-family : Verdana," >
            <h4> <?php $date = explode('-', $data->fecha_nac) ?>  {{ Carbon\Carbon::createFromDate($date[0], $date[1], $date[2])->age }} años  </h4>    
          </div>
          <div class= "col-xs-3"  style="background-color :#CEE3F6; font-family : Verdana," >
            <h4>FECHA     :</h4> 
          </div>  
        
          <div class= "col-xs-3" style="background-color :#E0ECF8; font-family : Verdana," >
            <h4> {{ Carbon\Carbon::now()->toDateString() }} {{ Carbon\Carbon::now()->toTimeString() }}</h4>    
          </div>
        </div>
        <br>           
      </div>

    
    <div class="row">
      <div class="col-md-12">
        <!-- Custom Tabs -->
        @if(count($antecedente) > 0)
        <div class = "col-xs-12">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active">	
             
              <li class="active"><a href="#consultas" data-toggle="tab"><i class="fa fa-file-text-o fa-2x" aria-hidden="true"></i> CONSULTA</a></li>
              <li><a href="#antecedentes"   data-toggle="tab"><i  background = "#FF5733" class="fa fa-file-text-o fa-2x" aria-hidden="true"></i> ANTECEDENTES</a></li>
              <li><a href="#recetas" data-toggle="tab"><i class="fa fa-medkit fa-2x"></i> RECETAS MEDICAS</a></li>
              <li><a href="#hc" data-toggle="tab"><i class="fa fa-history fa-2x"></i> VER HISTORIA CLINICA</a></li>
              <li><a href="#examenes" data-toggle="tab"><i class="fa fa-file-image-o fa-2x"></i> EXAMENES </a></li>
              <li><a href="#laboratorios" data-toggle="tab"><i class="fa fa-flask fa-2x"></i> LABORATORIOS</a></li>
            </li>
          </ul>
          <div class="tab-content">           
              <div class="tab-pane active" id="consultas">
             {{Form::open(['url' => '/hclinica/store/'.Crypt::encrypt($data->id), 'method' => 'post', 'role' => 'form'])}}
                @include('vendor.clinica.partial.errors')
                  <div class="box-body">
                    <div class="row  5">
                      <div class="col col-lg-12 col-md-12 col-xs-12  ">
                        <div class="col-xs-3 ">
                          <div class="form-group">
                            {{ Form::label('peso', 'PESO ACTUAL') }}                            
                             <input type="text" class="form-control"  id = "peso" name="peso" value="{{ old('peso') }}">
                          </div>                              
                        </div>

                        <div class="col-xs-3 ">
                          <div class="form-group">
                            {{ Form::label('talla', 'TALLA ACTUAL') }}
                            {{ Form::text('talla', old('talla'), ['class' => 'form-control text-uppercase', 'minlegth' => '2']) }}
                          </div>                              
                        </div>

                        <div class="col-xs-2 ">
                          <div class="form-group">
                            {{ Form::label('presion', 'PRESION ARTERIAL') }}
                            {{ Form::text('presion', old('presion'), ['class' => 'form-control text-uppercase', 'minlegth' => '2']) }}
                          </div>                              
                        </div>

                        <div class="col-xs-2 ">
                          <div class="form-group">
                            {{ Form::label('temperatura', 'TEMPERATURA') }}
                            {{ Form::text('temperatura', old('temperatura'), ['class' => 'form-control text-uppercase','minlegth' => '2']) }}
                          </div>                              
                        </div>
                        

                        <div class="col-xs-2 ">
                           <div class= "form-group">
                            {{ Form::label('grados', 'GRADOS') }}
                            {{ Form::select('grados', ['grados'=>'°C'],null, ['class' => 'form-control text-uppercase']) }}
                          </div>                             
                        </div>


                        <div class="form-group">
                          {{ Form::label('subjetivo', 'SUBJETIVO') }}                              
                          <!--textarea class="form-control" rows="6" name= "subjetivo" required="true"  placeholder="subjetivo" ></textarea-->
                          {{ Form::textarea('subjetivo', old('subjetivo'), ['class' => 'form-control', 'rows' => '6'])}}
                        </div>

                        <div class="form-group">
                          {{ Form::label('objetivo', '  OBJETIVO') }}
                          {{ Form::textarea('objetivo', old('objetivo'), ['class' => 'form-control', 'rows' => '6' ])}}
                        </div>

                        <div class="form-group">
                          {{ Form::label('analisis', 'ANALISIS') }}
                          {{ Form::textarea('analisis', old('analisis'), ['class' => 'form-control', 'rows' => '6'])}}
                        </div>

                        <div class="form-group">
                          {{ Form::label('plan', 'PLAN') }}
                          {{ Form::textarea('plan', old('plan'), ['class' => 'form-control', 'rows' => '6'])}}
                        </div>

                        <div class="form-group">
                          <a href="{{ url('hclinica/g') }}" class="btn btn-danger"><i class="fa fa-times"> CANCELAR</i></a>
                          <button type="submit" class="btn btn-sm btn-primary">GUARDAR</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  {{ Form::close() }}
              </div>

           <div class="tab-pane" id="antecedentes">
              <div class="box-body">
                <table id="antecedentes" class="table table-bordered table-hover">
                 <div class="bg-navy-active color-palette"><span>ANTECEDENTES MEDICOS</span></div>                  
                  @include('vendor.clinica.partial.amedico')
                </table>

               
                <table id="antecedentes" class="table table-bordered table-hover">
                   <div class="bg-navy-active color-palette"><span>ANTECEDENTES HEREDO FAMILIARES</span></div>                  
                    @include('vendor.clinica.partial.afamiliar')
                </table>

                <table id="antecedentes" class="table table-bordered table-hover">
                   <div class="bg-navy-active color-palette"><span>ANTECEDENTES PERSONAL</span></div>            
                        @include('vendor.clinica.partial.apersonal')
                </table>


                <table id="antecedentes" class="table table-bordered table-hover">
                   <div class="bg-navy-active color-palette"><span>ANTECEDENTES PERINATAL</span></div>                  
                    @include('vendor.clinica.partial.aperinatal')
                </table>
                
                <table id="antecedentes" class="table table-bordered table-hover">
                   <div class="bg-navy-active color-palette"><span>ANTECEDENTES GINECO-OBSTETRICOS</span></div>                  
                    @include('vendor.clinica.partial.agineco')
                </table>

            </div>
          </div>

          <div class="tab-pane" id="hc">
            <div class="box-body">
              @include('vendor.clinica.partial.hc')
            </div>            
          </div>
              
              <div class="tab-pane" id="recetas">
                RECETAS MEDICAS
                <div class="box-body">
                  @include('vendor.clinica.partial.receta')
                </div>
              </div>
              
              <div class="tab-pane" id="examenes">
                EXAMENES COMPLEMENTARIOS
                <thead>
                  <tr>
                    <th>NOMBRES </th>
                  </tr>
              </div>

              <div class="tab-pane" id="laboratorios"/>
                LABORATORIOS
                <div class="box-body">
                  @include('vendor.clinica.partial.laboratorio')
                </div>
              </div>
            </div>
	      </div>
        @else
        <div class="alert alert-danger">
          <b>INFORMACION</b> Este paciente aun no registro los antecedentes clinicos. Para llenar el la hoja de antecedentes siga el siguiente enlace
          <br>
          <a href="{{url('hclinica/antcreate/'.Crypt::encrypt($data->id))}}" class="btn btn-sm btn-primary">CREAR ANTECEDENTE</a>
        </div>
        @endif
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
{!! Html::script('vendor/adminlte/dist/js/app.min.js') !!}
<script>
  $(function () {
    $("#usuarios").DataTable();
  });
</script>
@endsection

