@extends('adminlte::layout.index')

@section('title')
Consultas 
@endsection

@section('before_styles')
@endsection

@section('after_styles')
	{!! Html::style('vendor/adminlte/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection

@section('messages')
@endsection

@section('title-page')
Consultas Medicas
@endsection

@section('description-page')
Lista de Consultas Medicas
@endsection

@section('content')
<div class="box">
	<div class="box-header">
		<h3 class="box-title"><i class="fa fa-users"></i> LISTA DE CONSULTAS</h3>
	</div>
	<div class="box-body">
		<table id="citas" class="table table-bordered table-hover">
			<div class="tab-pane" id="consultas">
                <thead>
				<tr>
					<th>N°</th>
					<th>NOMBRES & APELLIDOS</th>
					<th>ESTADO</th>
				</tr>
				</thead>
				<tbody>
					@foreach($data as $row)
	                  <tr>
	                  	<td> {{$row->id}}</td>
	           			<td class="text-capitalize">{{ $row->paciente->people->name }} {{ $row->paciente->people->firstname }} {{ $row->paciente->people->lastname }}</td>
	                    @if($row->estado === 'activo')
	                    <td>
	                    
	                      <a  style="background-color:#01DF74" href="{{ url('hclinica/create/'. Crypt::encrypt($row->paciente_id)) }}">atender</a>
	                    </td>
	                    @else
	                    <td>
	                      atendido
	                    </td>
	                    @endif
	                  </tr>
                  @endforeach
				</tbody>
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
    $('#citas').DataTable( {
    language: {
    	url: "{{ asset('vendor/adminlte/plugins/datatables/es.json')}}"
    }
	});
  });
</script>
@endsection

