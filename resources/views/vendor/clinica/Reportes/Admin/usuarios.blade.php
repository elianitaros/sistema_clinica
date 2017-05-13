<html>
	<head>
		<title>REPORTE DE USUARIOS</title>
	</head>
	<body>
		<h2>LISTA DE USUARIOS</h2>
		<table style="">
		<tr>
			<th>username</th>
			<th>email</th>
			<th>rol</th>
		</tr>
		@foreach($data as $row)
			<tr>
				<td>{{ $row->username }}</td>
				<td>{{ $row->email }}</td>
				<td>{{ $row->rol }}</td>
			</tr>
		@endforeach
		</table>
	</body>
</html>