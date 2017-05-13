<div class="tab-pane" id="consultas">
  <thead>
    <tr>
      <th class="bg-light-blue color-palette">ALERGIAS</th>
      <th class="bg-light-blue color-palette">GRUPO SANGUINEO</th>
    </tr>
  </thead>
  <tbody>
    @foreach($antecedente as $row)
      <tr>
        <td>{{ $row->id }}</td>
        <td>{{ $row->grupo_sanguineo}}  {{ $row->rh }}</td>
      </tr>
    @endforeach
  </tbody>
</div>





  



 



