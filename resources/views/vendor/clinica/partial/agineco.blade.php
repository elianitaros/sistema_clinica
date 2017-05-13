<div class="tab-pane" id="consultas">
  <thead>
    <tr>
      <th class="bg-light-blue color-palette">MENARCA</th>
      <th class="bg-light-blue color-palette">TELARCA</th>
      <th class="bg-light-blue color-palette">RITMO MENSTRUAL</th>
    </tr>
  </thead>
  <tbody>
    @foreach($gineco as $row)
      <tr>
        <td>{{ $row->menarca }}</td>
        <td>{{ $row->telarca}}</td>
        <td>{{ $row->ritmo_menstrual}}</td>
      </tr>
    @endforeach
  </tbody>
</div>

<div class="tab-pane" id="consultas">
  <thead>
    <tr>
      <th class="bg-light-blue color-palette">DISMENORREA</th>
      <th class="bg-light-blue color-palette">FUM</th>
      <th class="bg-light-blue color-palette">N° DE PAREJAS</th>
    </tr>
  </thead>
  <tbody>
    @foreach($gineco as $row)
      <tr>
        <td>{{ $row->dismenorrea}}</td>
        <td>{{ $row->fum}}</td>
        <td>{{ $row->parejas}}</td>
      </tr>
    @endforeach
  </tbody>
</div>
</table>
<table id="antecedentes" class="table table-bordered table-hover">
  <div class="tab-pane" id="antecedentes">  
    <thead>   
        <tr>
        <th class="bg-light-blue color-palette">G</th>
        <th class="bg-light-blue color-palette">A</th>
        <th class="bg-light-blue color-palette">P</th>
        <th class="bg-light-blue color-palette">C</th>
        <th class="bg-light-blue color-palette">FUP</th>
        <th class="bg-light-blue color-palette">MEN/CLIMATERIO</th>
      </tr>     
    </thead>
    
    <tbody>
      @foreach($gineco as $row)
        <tr>
          <td>{{ $row->gesta}}</td>
          <td>{{ $row->aborto}}</td>
          <td>{{ $row->parto}}</td>
          <td>{{ $row->cesarea}}</td>
          <td>{{ $row->fup}}</td>
          <td>{{ $row->men_climaterio}}</td>
        </tr>
      @endforeach
    </tbody>
  </div>
</table>

<table id="antecedentes" class="table table-bordered table-hover">
  <div class="tab-pane" id="antecedentes">  
    <thead>   
        <tr>
        <th class="bg-light-blue color-palette">METODO PLANIFICACION (DESCRIPCION)</th>
      </tr>     
    </thead>
    
    <tbody>
      @foreach($gineco as $row)
        <tr>
          <td>{{ $row->metodo_planificacion}} {{ $row->descripcion}}</td>
        </tr>
      @endforeach
    </tbody>
  </div>
</table>

<table id="antecedentes" class="table table-bordered table-hover">
  <div class="tab-pane" id="antecedentes">  
    <thead>   
        <tr>
        <th class="bg-light-blue color-palette">PAP (DESCRIPCION)</th>
        <th class="bg-light-blue color-palette">MAMOGRAFIA</th>
      </tr>     
    </thead>
    
    <tbody>
      @foreach($gineco as $row)
        <tr>
          <td>{{ $row->pap }} {{ $row->descripcion1}} </td>
          <td>{{ $row->mamografia}}</td>
        </tr>
      @endforeach
    </tbody>
  </div>
</table>




