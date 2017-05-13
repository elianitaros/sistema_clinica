<table id="hc" class="table table-bordered table-hover">
  <thead>
    <tr>
      <th class="bg-light-blue disabled color-palette">FECHA</th>
      <th class="bg-light-blue disabled color-palette">ESPECIALIDAD</th>
      <th class="bg-light-blue disabled color-palette">MEDICO</th>
    </tr>
  </thead>
  <tbody>
   @foreach($receta as $row)
    <tr>
      <td><a href="{{ url('hclinica/recshow/'.Crypt::encrypt($row->id)) }}">{{ $row->created_at }}</a></td>
      <td>{{ $row->medico->especialidad->nombre }}</td>
      <td>{{ $row->medico->people->name }} {{ $row->medico->people->fisrtname }} {{ $row->medico->people->lastname }}</td>    
    </tr>
    @endforeach
  </tbody>
</table>
 

 

