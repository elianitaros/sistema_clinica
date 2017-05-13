<html>
	<head>
		<title>REPORTE DE CITAS</title>
	</head>
	<body>
		<center><h2>LISTA DE CITAS</h2></center>
		<center><h5>DESDE: {{ $request->fecha_inicio }} HASTA: {{ $request->fecha_fin }}</h5></center>
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