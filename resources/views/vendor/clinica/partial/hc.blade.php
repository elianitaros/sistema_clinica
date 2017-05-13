<table id="hc" class="table table-bordered table-hover">
  <thead>
    <tr>
      <th class="bg-navy disabled color-palette">HISTORIA CLINICA</th>
      <th class="bg-navy disabled color-palette">ESPECIALIDAD</th>
      <th class="bg-navy disabled color-palette">MEDICO</th>
      <th class="bg-navy disabled color-palette">FECHA</th>
    </tr>
  </thead>
  <tbody>
   @foreach($hc as $row)
    <tr>
      <td><a href="{{ url('hclinica/show/'.Crypt::encrypt($row->id)) }}">{{ $row->paciente->people->ci }}</a></td>
      <td>{{ $row->medico->especialidad->nombre }}</td>
      <td>{{ $row->medico->people->name }} {{ $row->medico->people->fisrtname }} {{ $row->medico->people->lastname }}</td>    
      <td>{{ $row->created_at}}</td>    
    </tr>
    @endforeach
  </tbody>
</table>
 

 

