<div class="tab-pane" id="consultas">
  <thead>
    <tr>
      <th class="bg-light-blue color-palette">CARDIOVASCULARES</th>
      <th class="bg-light-blue color-palette">NEUROLOGICOS</th>
      <th class="bg-light-blue color-palette">NEOPLASICOS</th>
    </tr>
  </thead>
  <tbody>
    @foreach($familiar as $row)
      <tr>
        <td>{{ $row->cardiovasculares }}</td>
        <td>{{ $row->neurologicos}}</td>
        <td>{{ $row->neoplasicos}}</td>
      </tr>
    @endforeach
  </tbody>
</div>

<div class="tab-pane" id="consultas">
  <thead>
    <tr>
      <th class="bg-light-blue color-palette">ENDOCRINOS</th>
      <th class="bg-light-blue color-palette">RESPIRATORIOS</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach($familiar as $row)
      <tr>
        <td>{{ $row->endocrinos }}</td>
        <td>{{ $row->respiratorios}}</td>
        <td></td>
      </tr>
    @endforeach
  </tbody>
</div>

