<li><a href="/escritorio"><i class="fa fa-circle-o text-red"></i> <span>Escritorio</span></a></li>

@if(Auth::user()->type === 'admin')
    <li class="header">MODULO ADMINISTRACION</li>
    <li class="treeview">


      <a href="#">
        <i class="fa fa-users"></i> <span>Usuarios</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
        
          <ul class="treeview-menu">
            <li><a href="{{ url('admin/usuarios') }}"><i class="fa fa-list"></i> Listar</a></li>
            <li><a href="{{ url('admin/usuarios/create') }}"><i class="fa fa-plus"></i> Nuevo</a></li>
          </ul>  
        
    </li>    
      
    <li class="treeview">


      <a href="#">
        <i class="fa fa-heartbeat"></i> <span>Especialidades</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ url('admin/especialidades') }}"><i class="fa fa-list"></i> Listar</a></li>
        <li><a href="{{ url('admin/especialidades/create') }}"><i class="fa fa-plus"></i> Nuevo</a></li>
      </ul>
    </li>

    <li class="treeview">
      <a href="#">
        <i class="fa fa-user-md"></i> <span>Medicos</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ url('admin/medicos') }}"><i class="fa fa-list"></i> Listar</a></li>
        <li><a href="{{ url('admin/medicos/create') }}"><i class="fa fa-plus"></i> Nuevo</a></li>
      </ul>
    </li>


    <li class="treeview">
      <a href="#">
        <i class="fa fa-calendar-o"></i> <span>Horarios</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ url('admin/horarios') }}"><i class="fa fa-list"></i> Listar</a></li>
        <li><a href="{{ url('admin/horarios/create') }}"><i class="fa fa-plus"></i> Nuevo</a></li>
      </ul>
    </li>

    <li class="treeview">
      <a href="#">
        <i class="fa fa-file-text-o"></i> <span>Reportes</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ url('admin/horarios') }}"><i class="fa fa-list"></i> Listar</a></li>
        <li><a href="{{ url('admin/horarios/create') }}"><i class="fa fa-plus"></i> Nuevo</a></li>
      </ul>
    </li>
@endif




@if(Auth::user()->type === 'fichaje'  || Auth::user()->type === 'admin')
    <li class="header">MODULO FICHAJE</li>
    <li class="treeview">

      <a href="#">
        <i class="fa fa-male"></i> <span>Filiaciones</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ url('fichaje/pacientes') }}"><i class="fa fa-list"></i> Listar</a></li>
        <li><a href="{{ url('fichaje/pacientes/create') }}"><i class="fa fa-plus"></i> Nuevo</a></li>
      </ul>
    </li>

    <li class="treeview">
      <a href="#">
        <i class="fa fa-calendar"></i> <span>Citas Medicas</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ url('fichaje/citas') }}"><i class="fa fa-list"></i> Ver citas</a></li>
        <li><a href="{{ url('fichaje/citas/create') }}"><i class="fa fa-calendar-plus-o"></i> Nueva Cita Medica</a></li>
      </ul>
    </li>

<li class="treeview">
      <a href="#">
        <i class="fa fa-file-text-o"></i> <span>Reportes</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ url('fichaje/reportes/citas') }}"><i class="fa fa-list"></i> LISTAR CITAS</a></li>
      </ul>
    </li>



@endif

@if(Auth::user()->type === 'medico'  || Auth::user()->type === 'admin')
   <li class="header">MODULO HISTORIAS CLINICAS</li>
<li class="treeview">

  <a href="#">
    <i class="fa fa-stethoscope"></i> <span>Consultas</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li><a href="{{ url('hclinica/g') }}"><i class="fa fa-list"></i> Listar</a></li>
  </ul>
</li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-pencil-square-o"></i> <span>Historiales Clinicos</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ url('admin/especialidades') }}"><i class="fa fa-list"></i> Listar</a></li>
        <li><a href="{{ url('admin/especialidades/create') }}"><i class="fa fa-plus"></i> Nuevo</a></li>
      </ul>
    </li>

    <li class="treeview">
       <a href="#">
        <i class="fa fa-file-text-o"></i> <span>Reportes</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ url('hclinica/citas') }}"><i class="fa fa-list"></i> REPORTE DE CITAS</a></li>
      </ul>
    </li>

    
@endif