<html>
	<head>
		<title>REPORTE DE CITAS MEDICAS</title>
	</head>
	<body>
		<div style="text-align:center">
			<h2>
				@if($dates['tipo'] === 'all')
					LISTA DE TODAS LAS CITAS
				@else
					LISTA DE TODAS LAS CITAS ATENDIDAS
				@endif
			</h2>
		</div>
		<h3>Reporte desde: {{ $dates['fecha_inicio'] }} hasta: {{ $dates['fecha_fin'] }}</h3>
		<table border="1px" style="width:100%">
		<tr>
			<th>PACIENTE</th>
			<th>MEDICO</th>
			<th>FECHA</th>
			<th>HORA</th>
		</tr>
		@foreach($data as $row)
			<tr>
				<td>{{ $row->paciente->people->name }} {{ $row->paciente->people->firstname }} {{ $row->paciente->people->lastname }}</td>
				<td>{{ $row->medico->people->name }} {{ $row->medico->people->firstname }} {{ $row->medico->people->lastname }}</td>
				<td>{{ $row->fecha_consulta }}</td>
				<td>{{ $row->hora_consulta }}</td>
			</tr>
		@endforeach
		</table>
	</body>
</html>


