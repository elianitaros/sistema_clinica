<table id="hc" class="table table-bordered table-hover">
  <thead>
    <tr>
      <th class="bg-light-blue disabled color-palette">LABORATORIO</th>
      <th class="bg-light-blue disabled color-palette">ESPECIALIDAD</th>
      <th class="bg-light-blue disabled color-palette">MEDICO</th>
      <th class="bg-light-blue disabled color-palette">FECHA</th>
    </tr>
  </thead>
  <tbody>
   @foreach($laboratorio as $row)
    <tr>
      <td><a href="{{ url('hclinica/labshow/'.Crypt::encrypt($row->id)) }}">{{ $row->id }}</a></td>
      <td>{{ $row->medico->especialidad->nombre }}</td>
      <td>{{ $row->medico->people->name }} {{ $row->medico->people->fisrtname }} {{ $row->medico->people->lastname }}</td>    
      <td>{{ $row->created_at}}</td>    
    </tr>
    @endforeach
  </tbody>
</table>
 

 

