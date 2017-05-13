<html>
	<head>
		<title>RECETA MEDICA</title>
	</head>
	<body>
		<h3>RECETA MEDICA</h3>

		<table style="width: 100%">
			<tr>
				<td width="70%"><b>NOMBRES Y APELLIDOS: </b>{{ $data->paciente->people->name }} {{ $data->paciente->people->firstname }}  {{ $data->paciente->people->lastname }}</td>
				<td width="30%"><b>FECHA: </b> {{ Carbon\Carbon::now()->toDateString() }}</td>
			</tr>
		</table>

		<table border="1px" style="width:100%">
			<tr>
				<th width="70%">MEDICAMENTO</th>
				<th width="30%">UNIDAD</th>
			</tr>
			@foreach($data->detalle as $row)
				<tr>
					
					<td>{{ $row->nombre_generico }}</td>
					<td>{{ $row->unidad }}</td>
				</tr>
			@endforeach
		</table>


		<table border="1px" style="border-collapse: collapse; width:100%">
		<tr>
			<th>DESCRIPCION</th>
		</tr>
		<tr>
			<td>{{ $data->descripcion }}</td>
		</tr>
		</table>

		<table style="width: 100%">
			<tr>
				<td width="70%"><b>MEDICO: </b>{{ $data->medico->people->name }} {{ $data->medico->people->firstname }}  {{ $data->medico->people->lastname }}</td>
			</tr>
		</table>
	</body>
</html>