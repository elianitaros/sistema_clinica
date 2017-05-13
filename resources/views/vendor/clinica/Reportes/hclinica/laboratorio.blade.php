<html>
	<head>
		<title>REPORTE DE CITAS</title>
	</head>
	<body>
		<table border="1px" style="width:100%">
		<tr>
			<th>PACIENTE</th>
			<td width="70%"><b>MEDICO: </b>{{ $data->paciente->people->name }} {{ $data->paciente->people->firstname }}  {{ $data->paciente->people->lastname }}</td>
			<td>{{ $data->hematologia }}</td>
				<td>{{ $data->bioquimica }}</td>
				<td>{{ $data->serologia }}</td>
		</tr>		
		</table>
	</body>
</html>