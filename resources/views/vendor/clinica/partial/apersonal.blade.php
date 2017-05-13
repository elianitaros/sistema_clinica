  @foreach($personal as $row)
  <tr>
    <th style="width: 5px" class="bg-light-blue color-palette">QUIRURGICOS</th>
    <th style="width: 300px">{{ $row->quirurgicos }}</th>
  </tr>
  
  <tr>
    <th style="width: 5px" class="bg-light-blue color-palette">TRANSFUSIONALES</th>
    <th style="width: 300px">{{ $row->transfusionales }}</th>
  </tr>

  <tr>
    <th style="width: 5px" class="bg-light-blue color-palette">TRAUMATICOS</th>
    <th style="width: 300px">{{ $row->traumaticos}}</th>
  </tr>

  <tr>
    <th style="width: 5px" class="bg-light-blue color-palette">HOSPITALIZACIONES PREVIAS</th>
    <th style="width: 300px">{{ $row->hospitalizaciones_previas }}</th>
  </tr>

  <tr>
    <th style="width: 5px" class="bg-light-blue color-palette">OTROS</th>
    <th style="width: 300px">{{ $row->descripcion }}</th>
  </tr>
@endforeach
</table>

<style>
  .table-bordered
  {
    border:  solid; 
    border-color: #0B0B3B;
  }
</style>

<div class = "row">

  <div class = "col-xs-7">
    <table class="table table-bordered">        
          @foreach($personal as $row)
            <tr>
              <th style="width: 5px" class="bg-light-blue color-palette">TABAQUISMO :</th>
              <th style="width: 300px">{{ $row->tabaquismo}}</th>
            </tr>
            <tr>
              <th style="width: 5px" class="bg-light-blue color-palette">ALCOHOLISMO :</th>
              <th style="width: 300px">{{ $row->alcohol}}</th>
            </tr>
            
            <tr>
              <th style="width: 5px" class="bg-light-blue color-palette">DROGAS :</th>
              <th style="width: 300px">{{ $row->drogas }}</th>
            </tr>

            <tr>
              <th style="width: 5px" class="bg-light-blue color-palette">INMUNIZACIONES :</th>
              <th style="width: 300px">{{ $row->hospitalizaciones_previas }}</th>
            </tr>

            <tr>
              <th style="width: 5px" class="bg-light-blue color-palette">OTROS</th>
              <th style="width: 300px">{{ $row->descripcion }}</th>
            </tr>
        @endforeach
      </table>
    </div>
  <div class = "col-xs-5">
    <table class="table table-bordered">        
        @foreach($personal as $row)
        <tr>
          <th style="width: 50px" class="bg-light-blue color-palette">ENFERMEDAD INFECCIOSA :</th>
          <td style="width: 150px">{{ $row->enfermedad_infecciosa}}</td>
        </tr>
        <tr>
          <th style="width: 5px" >Descripcion :</th>
          <th style="width: 300px">{{ $row->descripcion}}</th>
        </tr>
        @endforeach
    </table>
  </div>
</div>
   
