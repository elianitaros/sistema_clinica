@extends('adminlte::layout.index')

@section('title')
Laboratorio
@endsection

@section('before_styles')
@endsection

@section('after_styles')
	{!! Html::style('vendor/adminlte/plugins/datepicker/datepicker3.css') !!}
@endsection

@section('messages')
@endsection

@section('title-page')
laboratorios
@endsection

@section('description-page')
Todo sobre pacientes
@endsection

@section('content')

{{Form::open(['url' => '/hclinica/labstore/'.Crypt::encrypt($hc->id), 'method' => 'post', 'role' => 'form'])}}
@include('vendor.clinica.partial.errors')
{{ Form::hidden('paciente', $paciente->id) }}
<div class="box">
	<div class="box-header">
		<h3 class="box-title"><i class="fa fa-users"></i>SOLICITUD DE LABORATORIO</h3>
	</div>
	<div class="box-body">
		<div>
	        <h4>Nombres: {{ $paciente->people->name }} || Genero: {{ $paciente->genero }} || Edad: <?php $date = explode('-', $paciente->fecha_nac) ?>  {{ Carbon\Carbon::createFromDate($date[0], $date[1], $date[2])->age }} años  </h4>
	    </div>
		<div class="row">
		<div class="col col-lg-12 col-md-4 col-xs-12">
			<div class="form-group">
                                {{ Form::label('diagnostico', 'PESO ACTUAL') }}
                                {{ Form::text('diagnostico', old('diagnostico'), ['class' => 'form-control text-uppercase', 'required' => 'true', 'minlength' => '3']) }}
                              </div>                              
			<div class="col-xs-4">				
				<div class="form-group">               
					{{ Form::label('HEMATOLOGIA') }}
					<br>
					<input type="checkbox" name="hematologia[]" value="hemograma" >hemograma
					<br>
					<input type="checkbox" name="hematologia[]" value="V.S.G." >V.S.G.
					<br>
					<input type="checkbox" name="hematologia[]" value="reticulocitos" >reticulocitos
					<br>
					<input type="checkbox" name="hematologia[]" value="tiempo de protombina" >tiempo de protombina
					<br>
					<input type="checkbox" name="hematologia[]" value="INR" >INR
					<br>
					<input type="checkbox" name="hematologia[]" value="coombs directo" >coombs directo
					<br>
					<input type="checkbox" name="hematologia[]" value="grupo y factor" >grupo y factor
					<br>
					<input type="checkbox" name="hematologia[]" value="coombs indirecto" >coombs indirecto
					<br>
					<input type="checkbox" name="hematologia[]" value="recuento de plaquetas" >recuento de plaquetas
					<br>
					<input type="checkbox" name="hematologia[]" value="hematocrito" >hematocrito
					<br>
					<input type="checkbox" name="hematologia[]" value="hemoglobina" >hemoglobina
					<br>
					<input type="checkbox" name="hematologia[]" value="leucograma" >leucograma
					<br>
				</div>

				<div class="form-group"> 				
					{{ Form::label('HORMONAS') }}
					<br>
					<input type="checkbox" name="hormonas[]" value="tsh" >tsh
					<br>
					<input type="checkbox" name="hormonas[]" value="t3" >t3
					<br>
					<input type="checkbox" name="hormonas[]" value="t4 libre" >t4 libre
					<br>
					<input type="checkbox" name="hormonas[]" value="ac. anti tiroideos" >ac. anti tiroideos
					<br>
					<input type="checkbox" name="hormonas[]" value="prolactina" >prolactina
					<br>
					<input type="checkbox" name="hormonas[]" value="fsh" >fsh
					<br>
					<input type="checkbox" name="hormonas[]" value="lh" >lh
					<br>
					<input type="checkbox" name="hormonas[]" value="17 beta estradiol" >17 beta estradiol
					<br>
					<input type="checkbox" name="hormonas[]" value="progesterona" >progesterona
					<br>
					<input type="checkbox" name="hormonas[]" value="17 hidroxiprogesterona" >17 hidroxiprogesterona
					<br>
					<input type="checkbox" name="hormonas[]" value="testosterona total" >testosterona total
					<br>
					<input type="checkbox" name="hormonas[]" value="testosterona libre" >testosterona libre
					<br>
					<input type="checkbox" name="hormonas[]" value="acth" >acth
					<br>
					<input type="checkbox" name="hormonas[]" value="cortisol" >cortisol
					<br>
					<input type="checkbox" name="hormonas[]" value="eritropeyetina" >eritropeyetina
					<br>
					<input type="checkbox" name="hormonas[]" value="haptoglobina" >haptoglobina
					<br>
					<input type="checkbox" name="hormonas[]" value="insulina" >insulina
					<br>
				</div>

				<div class="form-group">
					{{ Form::label('MARCADORES') }}
					<br>
					<input type="checkbox" name="marcadores[]" value="psa">psa
					<br>
					<input type="checkbox" name="marcadores[]" value="cea">cea
					<br>
				</div>
			</div>
				

			<div class="col-xs-4">
				<div class="form-group">
					{{ Form::label('BIOQUIMICA') }}
					<br>
					<input type="checkbox" name="boiquimica[]" value="glucosa">glucosa
					<br>
					<input type="checkbox" name="boiquimica[]" value="hemoglobina glicosilada">hemoglobina glicosilada
					<br>
					<input type="checkbox" name="boiquimica[]" value="urea">urea
					<br>
					<input type="checkbox" name="boiquimica[]" value="creatina">creatina
					<br>
					<input type="checkbox" name="boiquimica[]" value="acido urico">acido urico
					<br>
					<input type="checkbox" name="boiquimica[]" value="sodio">sodio
					<br>
					<input type="checkbox" name="boiquimica[]" value="potasio">potasio
					<br>
					<input type="checkbox" name="boiquimica[]" value="cloro">cloro
					<br>
					<input type="checkbox" name="boiquimica[]" value="calcio">calcio
					<br>
					<input type="checkbox" name="boiquimica[]" value="fosforo">fosforo
					<br>
					<input type="checkbox" name="boiquimica[]" value="magnesio">magnesio
					<br>
					<input type="checkbox" name="boiquimica[]" value="hierro">hierro
					<br>
					<input type="checkbox" name="boiquimica[]" value="colesterol total">colesterol total
					<br>
					<input type="checkbox" name="boiquimica[]" value="colesterol hdl">colesterol hdl
					<br>
					<input type="checkbox" name="boiquimica[]" value="colesterol ldl">colesterol ldl
					<br>
					<input type="checkbox" name="boiquimica[]" value="trigliceridos">trigliceridos
					<br>
					<input type="checkbox" name="boiquimica[]" value="proteinas total">proteinas total
					<br>
					<input type="checkbox" name="boiquimica[]" value="albumina">albumina
					<br>
					<input type="checkbox" name="boiquimica[]" value="globulinas">globulinas
					<br>
					<input type="checkbox" name="boiquimica[]" value="bilirrubina total">bilirrubina total
					<br>
					<input type="checkbox" name="boiquimica[]" value="bilirrubina directa">bilirrubina directa
					<br>
					<input type="checkbox" name="boiquimica[]" value="bilirrubina indirecta">bilirrubina indirecta
					<br>
					<input type="checkbox" name="boiquimica[]" value="got/ast">got/ast
					<br>
					<input type="checkbox" name="boiquimica[]" value="gpt/alt">gpt/alt
					<br>
					<input type="checkbox" name="boiquimica[]" value="ggt">ggt
					<br>
					<input type="checkbox" name="boiquimica[]" value="fosfatasa alcalina">fosfatasa alcalina
					<br>
					<input type="checkbox" name="boiquimica[]" value="ldh">ldh
					<br>
					<input type="checkbox" name="boiquimica[]" value="amilasa">amilasa
					<br>
					<input type="checkbox" name="boiquimica[]" value="ck">ck
					<br>
				</div>

				<div class="form-group">

					{{ Form::label('ORINA') }}
					<br>
					<input type="checkbox" name="orina[]" value="examen gral">examen gral
					<br>
					<input type="checkbox" name="orina[]" value="proteinuria de 24h">proteinuria de 24h
					<br>
					<input type="checkbox" name="orina[]" value="prueba de embarazo">prueba de embarazo
					<br>
				</div>
				<div class="form-group">
					{{ Form::label('tincion_gram','TINCION GRAM') }}
					{{ Form::text('tincion_gram', old('tincion_gram'), ['class' => 'form-control text-uppercase' ,'placeholder' => 'describa','minlength' =>'2' ]) }}
				</div>
			</div>

			<div class="col-xs-4">

				{{ Form::label('SEROLOGIA') }}
				<br>
				<input type="checkbox" name="serologia[]" value="hai toxoplasmosis">hai toxoplasmosis
				<br>
				<input type="checkbox" name="serologia[]" value="toxoplasma igG">toxoplasma igG
				<br>
				<input type="checkbox" name="serologia[]" value="toxoplasma igM">toxoplasma igM
				<br>
				<input type="checkbox" name="serologia[]" value="hai chagas">hai chagas
				<br>
				<input type="checkbox" name="serologia[]" value="elisa chagas">elisa chagas
				<br>
				<input type="checkbox" name="serologia[]" value="rpr">rpr
				<br>
				<input type="checkbox" name="serologia[]" value="prueba de embarazo">prueba de embarazo
				<br>
				<input type="checkbox" name="serologia[]" value="factor reumatoide">factor reumatoide
				<br>
				<input type="checkbox" name="serologia[]" value="pcr">pcr
				<br>
				<input type="checkbox" name="serologia[]" value="asto">asto
				<br>
				<input type="checkbox" name="serologia[]" value="reaccion de widal">reaccion de widal
				<br>
				<input type="checkbox" name="serologia[]" value="reaccion de hudleson">reaccion de hudleson
				<br>
				<input type="checkbox" name="serologia[]" value="a.n.a.">a.n.a.
				<br>
				<input type="checkbox" name="serologia[]" value="prueba rapida sifilis">prueba rapida sifilis
				<br>
				<input type="checkbox" name="serologia[]" value="prueba rapida vih">prueba rapida vih
				<br>
				<input type="checkbox" name="serologia[]" value="prueba rapida chagas">prueba rapida chagas
				<br>
				
				{{ Form::label('MICROBIOLOGIA') }}
				<br>
				<input type="checkbox" name="microbiologia[]" value="cultivo orina">cultivo orina
				<br>
				<input type="checkbox" name="microbiologia[]" value="cultivo esputo">cultivo esputo
				<br>
				<input type="checkbox" name="microbiologia[]" value="'cultivo secrecion uretral">'cultivo secrecion uretral
				<br>
				<input type="checkbox" name="microbiologia[]" value="cultivo secresion vaginal">cultivo secresion vaginal
				<br>
				<input type="checkbox" name="microbiologia[]" value="coprocultivos">coprocultivos
				<br>
				<input type="checkbox" name="microbiologia[]" value="cultivo herida">cultivo herida
				<br>
				<input type="checkbox" name="microbiologia[]" value="exudado vaginal">exudado vaginal
				<br>
				<input type="checkbox" name="microbiologia[]" value="exudado uretral">exudado uretral
				<br>				

				{{ Form::label('CITOLOGIA') }}
				<br>
				<input type="checkbox" name="citologia[]" value="pap">pap
				<br>
				

				{{ Form::label('PREOPERATOTIO') }}
				<br>
				<input type="checkbox" name="preoperatorio[]" value="hemograma tp glucosa">hemograma tp glucosa
				<br>
				

				{{ Form::label('PARASITOLOGIA') }}
				<br>
				<input type="checkbox" name="parasitologia[]" value="cropoparasitologico simple">cropoparasitologico simple
				<br>
				<input type="checkbox" name="parasitologia[]" value="cropoparasitologico serio">cropoparasitologico serio
				<br>
				<input type="checkbox" name="parasitologia[]" value="moco fecal">moco fecal
				<br>
				<input type="checkbox" name="parasitologia[]" value="sangra oculta">sangra oculta en heces 
				<br>
				<input type="checkbox" name="parasitologia[]" value="test graham">test graham
				<br>
			</div>
		</div>

		<div class="col col-lg-12 col-md-12 col-xs-12">
			<div class="form-group">
				<a class="btn btn-info" href="{{ URL::previous() }}">back</a>
					<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> GUARDAR</button>
			<div>
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
	</script>
@endsection

