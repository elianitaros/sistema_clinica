@extends('adminlte::layout.index')

@section('title')
Registrar antecedentes  medicos del paciente
@endsection

@section('before_styles')
@endsection

@section('after_styles')
	{!! Html::style('vendor/adminlte/plugins/datepicker/datepicker3.css') !!}
@endsection

@section('messages')
@endsection

@section('title-page')
antecedentes
@endsection

@section('description-page')
Todo sobre pacientes
@endsection

@section('content')

{{Form::open(['url' => '/hclinica/antstore/'.Crypt::encrypt($paciente->id), 'method' => 'post', 'role' => 'form'])}}
@include('vendor.clinica.partial.errors')
<div class="box">
	<div class="box-header">
		<h3 class="box-title"><i class="fa fa-users"></i> ANTECEDENTES DEL PACIENTE</h3>
	</div>
	<div class="box-body">
		<div>
	        <h4>Nombres: {{ $paciente->people->name }} || Genero: {{ $paciente->genero }} || Edad: <?php $date = explode('-', $paciente->fecha_nac) ?>  {{ Carbon\Carbon::createFromDate($date[0], $date[1], $date[2])->age }} años  </h4>
	    </div>
		<div class="row">
		<div class="col col-lg-12 col-md-6 col-xs-12">
			<div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                
            <div class="panel box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#ant2">
                        ANTECEDENTES HEREDO FAMILIARES
                      </a>
                    </h4>
                  </div>
                <div id="ant2" class="panel-collapse collapse">
		      	    <div class="box-body">
						<div class="col col-lg-4 col-md-12 col-xs-4">				
							<div class="form-group">               
							{{ Form::label('CARDIOVASCULARES') }}
							<br>
							<input type="checkbox" name="cardiovascular[]" value="hipertension arterial" >Hipertension Arterial
							<br>
							<input type="checkbox" name="cardiovascular[]" value="cardiopatia" >Cardiopatia
							<br>					
							<input type="checkbox" name="cardiovascular[]" id="otros" value="otros" >Otros
							<br>
							
							{{ Form::text('descripcion', old('descripcion'), ['class' => 'form-control text-uppercase', 'id' => 'descripcion' , 'placeholder' => 'describa', 'readonly' => 'true']) }}
							<br>		
	
							
							{{ Form::label('ENDOCRINO') }}
							<br>
							<input type="checkbox" name="endocrino[]" value="diabetes mellitus">Diabetes Mellitus
							<br>
							<input type="checkbox" name="endocrino[]" value="enfi. tiroideas">Enf. Tiroideas
							<br>
							<input type="checkbox" name="endocrino[]"  id = "otros1" value="otros">Otros
							<br>
							{{ Form::text('descripcion1', old('descripcion1'), ['class' => 'form-control text-uppercase', 'id' => 'descripcion1' , 'placeholder' => 'describa', 'readonly' => 'true']) }}
							<br>
							</div>
						</div>

						<div class="col col-lg-4 col-md-12 col-xs-4">				
							<div class="form-group">               
							{{ Form::label('neurologico', 'NEUROLOGICOS') }}
							<br>
							<input type="checkbox" name="neurologico[]" value="migraña" > Migraña
							<br>
							<input type="checkbox" name="neurologico[]" value="epilepsia" > Epilepsia
							<br>
							<input type="checkbox" name="neurologico[]" value="Enf.Depresivas" > Enf.Depresivas
							<br>
							<input type="checkbox" name="neurologico[]" id = "otros2" value="otros" >Otros
							<br>
							{{ Form::text('descripcion2', old('descripcion2'), ['class' => 'form-control text-uppercase', 'id' => 'descripcion2' , 'placeholder' => 'describa', 'readonly' => 'true']) }}
							<br>
							{{ Form::label('respiratorio', 'RESPIRATORIOS') }}
							<br>
							<input type="checkbox" name="respiratorio[]" value="asma">Asma
							<br>
							<input type="checkbox" name="respiratorio[]" value="tbc">TBC
							<br>
							<input type="checkbox" name="respiratorio[]" id= "otros3" value="otros">Otros
							{{ Form::text('descripcion3', old('descripcion3'), ['class' => 'form-control text-uppercase', 'id' => 'descripcion3' , 'placeholder' => 'describa', 'readonly' => 'true']) }}
							<br>
							</div>
						</div>

						<div class="col col-lg-4 col-md-12 col-xs-4">				
							<div class="form-group">               
							{{ Form::label('neoplasico', 'NEOPLASICOS') }}
							<br>
							<input type="checkbox" name="neoplasico[]" value="cancer" >Cancer
							<br>
							<input type="checkbox" name="neoplasico[]" value="tumores" >Tumores
							<br>
							<input type="checkbox" name="neoplasico[]"  id= "otros4" value="otros" >Otros
							{{ Form::text('descripcion4', old('descripcion4'), ['class' => 'form-control text-uppercase','id' => 'descripcion4', 'readonly' => 'true' , 'placeholder' => 'describa']) }}
							<br>
							</div>
						</div>
					</div>
				</div>
			
			

                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
            <div class="panel box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-parent-toggle="collapse" data-parent="#accordion" href="#ant3">
                        ANTECEDENTES PERSONALES
                      </a>
                    </h4>
                 </div>
                <div id="ant3" class="panel-collapse collapse ">
                    <div class="box-body">
                    <div class="col col-lg-12 col-md-12 col-xs-12">

						<input type="checkbox" name="a[]" id= "quirurgico" value="quirurgico">QUIRURGICO
						{{ Form::text('quirurgicos', old('quirurgicos'), ['class' => 'form-control text-uppercase', 'id'=>'quirurgicos','readonly'=>'true','placeholder' => 'describa las cirugias del paciente']) }}
						<br>
						<input type="checkbox" name="a[]" id="transfusional" value="transfusional" >TRANSFUSIONALES
						{{ Form::text('transfusionales', old('transfusionales'), ['class' => 'form-control text-uppercase', 'id'=>'transfusionales','readonly'=>'true','placeholder' => 'describa las transfusiones del paciente']) }}
						<br>
						<input type="checkbox" name="a[]" id= "traumatico" value="traumatico" >TRAUMATICOS
						{{ Form::text('traumaticos', old('traumaticos'), ['class' => 'form-control text-uppercase','id'=>'traumaticos','readonly'=>'true', 'placeholder' => 'describa los traumas del paciente']) }}
						<br>
						<input type="checkbox" name="a[]" id="hospitalizacion_previa" value="hospitalizacion_previa" >HOSPITALIZACIONES PREVIAS
						{{ Form::text('hospitalizaciones_previas', old('hospitalizaciones_previas'), ['class' => 'form-control text-uppercase', 'id'=>'hospitalizaciones_previas','readonly'=>'true','placeholder' => 'describa las hospitalizaciones del paciente']) }}
						<br>
						<input type="checkbox" name="a[]" id="otros5" value="otros" >OTROS
						{{ Form::text('descripcion', old('descripcion'), ['class' => 'form-control text-uppercase', 'id'=>'descripcion5','readonly'=>'true','placeholder' => 'describa']) }}					
					</div>
					<div class="col col-lg-12 col-md-12 col-xs-12">				
						<br>	
						<div class="col col-lg-6 col-md-12 col-xs-6">	
							<div class="form-group">
								{{ Form::label('tabaquismo', 'Tabaquismo') }}
								<input type="radio" name="tabaquismo" value="si"> Si
								<input type="radio" name="tabaquismo" value="no" checked> No
								<input type="radio" name="tabaquismo" value="aveces"> A veces
								<br>	
								{{ Form::label('alcohol', 'Alcohol') }}
								<input type="radio" name="alcohol" value="si"> Si
								<input type="radio" name="alcohol" value="no" checked> No
								<input type="radio" name="alcohol" value="aveces"> A veces
								<br>							
								{{ Form::label('drogas', 'Drogas') }}
								<input type="radio" name="drogas" value="si" > Si
								<input type="radio" name="drogas" value="no" checked> No
								<input type="radio" name="drogas" value="aveces"> A veces
								<br>
							</div>	
							<div class="form-group">
								{{ Form::label('inmunizaciones', 'INMUNIZACONES') }}
								<br>
								<input type="radio" name="inmunizaciones" id="otros6" value="completas a edad" checked>Completas a edad<tr>
								{{ Form::text('descripcion1', old('descripcion1'), ['class' => 'form-control text-uppercase', 'id'=>'descripcion6','readonly'=>'true','placeholder' => 'escrinba la edad ']) }}					
								<input type="radio" name="inmunizaciones"  id="otros7" value="pendientes">Pendientes
								{{ Form::text('descripcion2', old('descripcion2'), ['class' => 'form-control text-uppercase', 'id'=>'descripcion7','readonly'=>'true','placeholder' => 'describa la edad']) }}					
								<input type="checkbox" name="otros"  id="otros21" value="otros">Otros
								{{ Form::text('descripcion3', old('descripcion3'), ['class' => 'form-control text-uppercase', 'id'=>'otros12','readonly'=>'true','placeholder' => 'describa']) }}					
								<br>
							</div>
						</div>
						

						<div class="col col-lg-6 col-md-12 col-xs-6">				
						<div class="form-group"> 
							{{ Form::label('enfermedad_infecciosa', 'ENFERMEDADES INFECCIOSAS') }}
							<br>
							<input type="checkbox" name="enfermedad_infecciosa[]" value="parotiditis">Parotiditis (paperas)
							<br>
							<input type="checkbox" name="enfermedad_infecciosa[]" value="rubeola">Rubeola
							<br>
							<input type="checkbox" name="enfermedad_infecciosa[]" value="sarampion">Sarampion
							<br>
							<input type="checkbox" name="enfermedad_infecciosa[]" value="varicela">Varicela
							<br>
							<input type="checkbox" name="enfermedad_infecciosa[]" value="varicela">Hepatitis
							<br>
							<input type="checkbox" name="enfermedad_infecciosa[]" value="fiebretifoidea">Fiebre Tifoidea
							<br>
							<input type="checkbox" name="enfermedad_infecciosa[]" id="otros8" value="otros">Otros
							{{ Form::text('descripcion4', old('descripcion4'), ['class' => 'form-control text-uppercase', 'id' => 'descripcion8' , 'readonly' =>'true' ,'placeholder' => 'describa']) }}					
							<br>
						</div>
						</div>
					</div>
                 	</div>
                </div>
            </div>
            </div>

			@if(Carbon\Carbon::createFromDate(explode('-', $paciente->fecha_nac)[0],explode('-', $paciente->fecha_nac)[1],explode('-', $paciente->fecha_nac)[2])->age <=11)
            <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
            <div class="panel box box-primary">
                  	<div class="box-header with-border">
                    	<h4 class="box-title">
	                      <a data-toggle="collapse" data-parent="#accordion" href="#ant4">
	                        ANTECEDENTES PERINATALES
	                      </a>
                    	</h4>
                  	</div>
                  	<div id="ant4" class="panel-collapse collapse ">
	                    <div class="box-body">
	                      	<div class="col col-lg-12 col-md-12 col-xs-12">
	                      		<div class="col-xs-6 ">		
									<div class="form-group">  	              
										{{ Form::label('numero_hijo', 'NUMERO DE HIJO') }}
										{{ Form::number('numero_hijo', old('numero_hijo')?old('numero_hijo'):0, ['class' => 'form-control text-uppercase','placeholder' => 'escriba el numero de hijo']) }}
									</div>
								</div>
								<div class="col-xs-6 ">	
									<div class="form-group">
										{{ Form::label('meses_gestacion', 'MESES DE GESTACION') }}
										{{ Form::number('meses_gestacion', old('meses_gestacion')?old('meses_gestacion'):0, ['class' => 'form-control text-uppercase','placeholder' => 'escriba el numero de meses de gestacion']) }}
									</div> 
								</div> 
								<div>
									<div class="form-group">
										{{ Form::label('sitio_nac', 'LUGAR DE NACIMIENTO') }}
										<br>
										<input type="radio" name="sitio_nac" value="domicilio"> Domicilio							
										<input type="radio" name="sitio_nac" value="hospital" > Hospital								
										<input type="radio" name="sitio_nac" value="c/s puesto de salud" checked > C/S Puesto de Salud								
										<input type="radio" name="sitio_nac" id= "otros9" value="otros" > Otros <br>
									</div>
									<div class="form-group">
										{{ Form::text('descripcion', old('descripcion'), ['class' => 'form-control text-uppercase','id'=>'descripcion9','readonly' => 'true','placeholder' => 'describa otro sitio de nacimiento del paciente']) }}					
									</div>
								</div>

								<div class="form-group">									
									<div class="col-xs-4 ">	
									<br>	
									<div class="form-group">  	              
										{{ Form::label('tipo_nac', 'TIPO DE NACIMIENTO') }}
										{{ Form::select('tipo_nac', ['parto' => 'parto', 'cesarea' => 'Cesarea'], old('tipo_nac'), ['class' => 'form-control text-uppercase']) }}
									</div>
									</div>

									{{ Form::label('DATOS DEL PACIENTE') }}
									<div class="form-group">
										<div class="col-xs-4 ">		
											<div class="form-group">  	              
												{{ Form::label('talla', 'Talla') }}
												{{ Form::text('talla', old('talla')?old('talla'):'20 cm', ['class' => 'form-control text-uppercase','placeholder' => 'escriba la talla del paciente','minlength' =>'2', 'required' => 'true']) }}
											</div>
										</div>

										<div class="col-xs-4 ">		
											<div class="form-group">  	              
											{{ Form::label('peso', 'Peso') }}
											{{ Form::text('peso', old('peso')?old('peso'):'4 k', ['class' => 'form-control text-uppercase' ,'placeholder' => 'escriba el peso del paciente','minlength' =>'2' ]) }}
											</div>
										</div>
									</div>
								</div>
									
								<div class="form-group">
									{{ Form::label('problemas_nac', 'PROBLEMAS DE NACIMIENTO (apnea,  convulsiones, ictericia, hemorragia,otros..)' )}}
										<input type="radio" name="problemas_nac" value="si"> Si
										<input type="radio" name="problemas_nac" value="no" checked> No
									
									{{ Form::text('especificacion', old('especificacion'), ['class' => 'form-control text-uppercase','placeholder' => 'describa los problemas']) }}
								</div>
							</div>
						</div>
	            	</div>
           	</div>
           	</div>
			@endif	
           	
	
			@if($paciente->genero === 'Femenino' && Carbon\Carbon::createFromDate(explode('-', $paciente->fecha_nac)[0],explode('-', $paciente->fecha_nac)[1],explode('-', $paciente->fecha_nac)[2])->age > 11)
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
            <div class="panel box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#ant5">
                        ANTECEDENTES GINECO-OBSTETRICOS
                      </a>
                    </h4>
                </div>
                <div id="ant5" class="panel-collapse collapse ">
                    <div class="box-body">
                      	<div class="col col-lg-12 col-md-12 col-xs-12">	
	                      	<div class="col-xs-4 ">					
								<div class="form-group">
									{{ Form::label('menarca', 'MENARCA') }}
									{{ Form::text('menarca', old('menarca')?old('menarca'):'ninguno', ['class' => 'form-control text-uppercase','placeholder' => 'entrada de tipo texto']) }}
								</div>
							</div>	

							<div class="col-xs-4 ">					
								<div class="form-group">
									{{ Form::label('telarca', 'TELARCA') }}
									{{ Form::text('telarca', old('telarca')?old('telarca'):'ninguno', ['class' => 'form-control text-uppercase','placeholder' => 'entrada de tipo texto']) }}
								</div>
							</div>	

							<div class="col-xs-4 ">					
								<div class="form-group">
									{{ Form::label('ritmo_menstrual', 'RITMO MENSTRUAL') }}
								{{ Form::text('ritmo_menstrual', old('ritmo_menstrual')?old('ritmo_menstrual'):'ninguno', ['class' => 'form-control text-uppercase','placeholder' => 'describa las cirugias del paciente']) }}
								</div>
							</div>		
						</div>

						<div class="col col-lg-12 col-md-12 col-xs-12">	
	                      	<div class="col-xs-4 ">					
								{{ Form::label('dismenorrea', 'DISMENORREA') }}
									<br>								
									<div class="col-xs-4 ">		
											<input type="radio" name="dismenorrea" value="si">Si 
									</div>
									<div class="col-xs-4 ">		
											<input type="radio" name="dismenorrea" value="no" checked>No
									</div>		
							</div>	

							<div class="col-xs-4 ">					
								<div class="form-group">
									{{ Form::label('fum', 'FUM') }}
									{{ Form::text('fum', old('fum')?old('fum'):Carbon\Carbon::now()->toDateString(), ['class' => 'form-control datepicker','placeholder' => 'ultima fecha de menstruacion'])}}
								</div>
							</div>	

							<div class="col-xs-4 ">					
								<div class="form-group">
									{{ Form::label('parejas', 'N° PAREJAS') }}
									{{ Form::number('parejas', old('parejas')?old('parejas'):0, ['class' => 'form-control text-uppercase','placeholder' => 'escriba el numeero de parejas del  paciente']) }}
								</div>
							</div>		
						</div>  

						<div class="col col-lg-12 col-md-12 col-xs-12">	
	                      	<div class="col-xs-4 ">	                      	
								<table>						
									<tr>
										<th>{{ Form::label('gesta', 'G') }}	{{ Form::number('gesta', old('gesta')?old('gesta'):0, ['class' => 'form-control text-uppercase','placeholder' => 'N°']) }} </td>
										<th>{{ Form::label('aborto', 'A') }} {{ Form::number('aborto', old('aborto')?old('aborto'):0, ['class' => 'form-control text-uppercase','placeholder' => 'N°']) }}</th>
										<th>{{ Form::label('parto', 'P') }}	{{ Form::number('parto', old('parto')?old('parto'):0, ['class' => 'form-control text-uppercase','placeholder' => 'N°']) }}</th>
										<th>{{ Form::label('cesarea', 'C') }} {{ Form::number('cesarea', old('cesarea')?old('cesarea'):0, ['class' => 'form-control text-uppercase','placeholder' => 'N°']) }}</th>
									</th>		
	        					</table>								
							</div>	

							<div class="col-xs-4 ">					
								<div class="form-group">
									{{ Form::label('fup', 'FUP') }}
									{{ Form::text('fup', old('fup')?old('fup'):Carbon\Carbon::now()->toDateString(), ['class' => 'form-control datepicker','placeholder' => 'ultima fecha de parto'])}}
								</div>
							</div>	

							<div class="col-xs-4 ">					
								<div class="form-group">
									{{ Form::label('men_climaterio', 'MENP/CLIMATERIO') }}
									{{ Form::text('men_climaterio', old('men_climaterio')?old('men_climaterio'):'ninguno', ['class' => 'form-control text-uppercase','placeholder' => 'describa','required'=>'true']) }}
								</div>
							</div>		
						</div>  						              
						
						<div class="col-xs-12">
							{{ Form::label('metodo_planificacion', 'METODO DE PLANIFICACION') }}
								<input type="radio" name="metodo_planificacion" value="no" checked> No
								<input type="radio" name="metodo_planificacion" value="si"> Si
								{{ Form::text('descripcion', old('descripcion'), ['class' => 'form-control text-uppercase','placeholder' => 'describa el metodo de planificacion']) }}						         			
						</div>  

						<div class="col col-lg-12">
						<div class="form-group">	
							<div class="col-xs-6 ">					
								<div class="form-group">
									{{ Form::label('pap', 'PAP') }}
									<input type="radio" name="pap" value="si"> Si
									<input type="radio" name="pap" value="no" checked> No
									{{ Form::text('descripcion1', old('descripcion1'), ['class' => 'form-control text-uppercase','placeholder' => 'papanicolau']) }}
								</div>
							</div>	

							<div class="col-xs-6 ">					
								<div class="form-group">
									{{ Form::label('mamografia', 'MAMOGRAFIA)') }}
									<input type="radio" name="mamografia" value="si"> Si
									<input type="radio" name="mamografia" value="no" checked> No
									
								</div>
							</div>		
						</div>
						</div>															
					</div>
                 </div>
            </div>
        	</div>
			@endif
			    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
		<div class="panel box box-primary">
           	<div class="box-header with-border">
	            <h4 class="box-title">
	                <a data-toggle="collapse" data-parent="#accordion" href="#ant1">
	                    ANTECEDENTES MEDICOS
	                </a>
	            </h4>
            <div>
	        <div id="ant1" class="panel-collapse collapse ">
	            <div class="box-body">
	               	<div class="form-group">               
						{{ Form::label('alergia', 'ALERGIAS') }}
						{{ Form::text('alergia', old('alergia')?old('alergia'):'ninguno', ['class' => 'form-control text-uppercase', 'placeholder' => 'describa las alergias del paciente']) }}
					</div>
					<div class="col-xs-6 ">					
						<div class="form-group">
						{{ Form::label('grupo_sanguineo', 'GRUPO SANGUINEO') }}
						{{ Form::select('grupo_sanguineo', ['O' => 'O', 'A' => 'A', 'B' => 'B', 'AB' => 'AB'], old('rol'), ['class' => 'form-control text-uppercase']) }}
						</div>
					</div>
					<div class="col-xs-6 ">	
						<div class="form-group">              
						{{ Form::label('rh', 'RH') }}
						{{ Form::select('rh', ['+' => '+', '-' => '-'], old('rh'), ['class' => 'form-control text-uppercase']) }}
						</div>
					</div>
					<div class="col col-lg-12 col-md-12 col-xs-12">
						<div class="form-group">
							<a class="btn btn-info" href="{{ URL::previous() }}">ATRAS</a>
								<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> GUARDAR</button>	
						<div>
					</div>
				</div>
	        </div>
        </div>
        </div>	

	</div>
</div>
{{ Form::close() }}
@endsection

@section('before_scripts')

@endsection

@section('after_scripts')
	{!! Html::script('vendor/adminlte/plugins/select2/select2.full.min.js') !!}
	{!! Html::script('vendor/adminlte/plugins/datepicker/bootstrap-datepicker.js') !!}
	<script>
		$('.datepicker').datepicker({
			format: 'yyyy-mm-dd'
		});

		$('#otros').on('click',function(){
         if ($(this).prop('checked'))
           $("#descripcion").prop('readOnly',false);
        else           
           $("#descripcion").prop('readOnly',true);          
    	});
	
		$('#otros1').on('click',function(){
         if ($(this).prop('checked'))
           $("#descripcion1").prop('readOnly',false);
        else           
           $("#descripcion1").prop('readOnly',true);          
		});
	
		$('#otros2').on('click',function(){
         if ($(this).prop('checked'))
           $("#descripcion2").prop('readOnly',false);
        else           
           $("#descripcion2").prop('readOnly',true);          
		});
	
		$('#otros3').on('click',function(){
         if ($(this).prop('checked'))
           $("#descripcion3").prop('readOnly',false);
        else           
           $("#descripcion3").prop('readOnly',true);          
		});
	
		$('#otros4').on('click',function(){
         if ($(this).prop('checked'))
           $("#descripcion4").prop('readOnly',false);
        else           
           $("#descripcion4").prop('readOnly',true);          
		});

		$('#otros5').on('click',function(){
         if ($(this).prop('checked'))
           $("#descripcion5").prop('readOnly',false);
        else           
           $("#descripcion5").prop('readOnly',true);          
		});


		$('#otros6').on('click',function(){
         if ($(this).prop('checked'))
           $("#descripcion6").prop('readOnly',false);
        else           
           $("#descripcion6").prop('readOnly',true);          
		});	


		$('#otros7').on('click',function(){
         if ($(this).prop('checked'))
           $("#descripcion7").prop('readOnly',false);
        else           
           $("#descripcion7").prop('readOnly',true);          
		});	
		
		$('#otros8').on('click',function(){
         if ($(this).prop('checked'))
           $("#descripcion8").prop('readOnly',false);
        else           
           $("#descripcion8").prop('readOnly',true);          
		});

		$('#otros9').on('click',function(){
         if ($(this).prop('checked'))
           $("#descripcion9").prop('readOnly',false);
        else           
           $("#descripcion9").prop('readOnly',true);          
		});

		$('#quirurgico').on('click',function(){
         if ($(this).prop('checked'))
           $("#quirurgicos").prop('readOnly',false);
        else           
           $("#quirurgicos").prop('readOnly',true);          
		});

		$('#transfusional').on('click',function(){
         if ($(this).prop('checked'))
           $("#transfusionales").prop('readOnly',false);
        else           
           $("#transfusionales").prop('readOnly',true);          
		});

		$('#traumatico').on('click',function(){
         if ($(this).prop('checked'))
           $("#traumaticos").prop('readOnly',false);
        else           
           $("#traumaticos").prop('readOnly',true);          
		});

		$('#hospitalizacion_previa').on('click',function(){
         if ($(this).prop('checked'))
           $("#hospitalizaciones_previas").prop('readOnly',false);
        else           
           $("#hospitalizaciones_previas").prop('readOnly',true);          
		});	

		$('#otros21').on('click',function(){
         if ($(this).prop('checked'))
           $("#otros12").prop('readOnly',false);
        else           
           $("#otros12").prop('readOnly',true);          
		});	

	</script>
@endsection

