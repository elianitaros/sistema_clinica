<div class="tab-pane" id="consultas">
  <thead>
    <tr>
      <th class="bg-light-blue color-palette">N° DE HIJO</th>
      <th class="bg-light-blue color-palette">MESES DE GESTACION</th>
    </tr>
  </thead>
  <tbody>
    @foreach($perinatal as $row)
      <tr>
        <td>{{ $row->numero_hijo }}</td>
        <td>{{ $row->meses_gestacion}}</td>
      </tr>
    @endforeach
  </tbody>
</div>

<div class="tab-pane" id="consultas">
  <thead>
    <tr>
      <th class="bg-light-blue color-palette">SITIO DE NACIMIENTO</th>
      <th class="bg-light-blue color-palette">TIPO DE NACIMIENTO</th>
    </tr>
  </thead>
  <tbody>
    @foreach($perinatal as $row)
      <tr>
        <td>{{ $row->sitio_nac }}</td>
        <td>{{ $row->tipo_nac}}</td>
      </tr>
    @endforeach
  </tbody>
</div>
<div class="tab-pane">
  <thead>
    <tr>
      <th class="bg-light-blue color-palette">DATOS DE NACIMIENTO</th>
      <th></th>
    </tr>
  </thead>
</div>
<div class="tab-pane">
  <thead>
    <tr>
      <th class="bg-light-blue color-palette">PESO</th>
      <th class="bg-light-blue color-palette">TALLA</th>
    </tr>
  </thead>
  <tbody>
    @foreach($perinatal as $row)
      <tr>
        <td>{{ $row->peso }}</td>
        <td>{{ $row->talla}}</td>
      </tr>
    @endforeach
  </tbody>
</div>

<div class="tab-pane">
  <thead>
    <tr>
      <th class="bg-light-blue color-palette">PRESENTO PROBLEMAS AL NACIMIENTO </th>
      <th class="bg-light-blue color-palette">(APNEA, CONVULSIONES, ICTERICINA, HEMORRAGIA, OTROS)</th>
    </tr>
  </thead>
  <tbody>
    @foreach($perinatal as $row)
      <tr>
        <td>{{ $row->problemas_nac}}</td>
        <td>{{ $row->especificacion}}</td>
      </tr>
    @endforeach
  </tbody>
</div>


