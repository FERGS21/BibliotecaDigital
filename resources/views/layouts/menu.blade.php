<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">

    <a class="nav-link" href="/home">
        <i class=" fas fa-building"></i><span>Inicio</span>
    </a>
    @can('ver-usuario')
    <a class="nav-link" href="/usuarios">
        <i class=" fas fa-users"></i><span>Usuarios</span>
    </a>
    @endcan

    @can('ver-rol')
    <a class="nav-link" href="/roles">
        <i class=" fas fa-user-lock"></i><span>Roles</span>
    </a>
    @endcan

    @can('ver-persona')
    <a class="nav-link" href="/personas">
        <i class="fas fa-user-edit"></i>  <span>Personas</span>
    </a>
    @endcan

    @can('ver-edicion')
    <a class="nav-link" href="/ediciones">
        <i class="fas fa-user-edit"></i>  <span>Ediciones</span>
    </a>
    @endcan

    @can('ver-editorial')
    <a class="nav-link" href="/editoriales">
        <i class="fas fa-user-edit"></i>  <span>Editoriales</span>
    </a>
    @endcan

    @can('ver-area')
    <a class="nav-link" href="/areas">
        <i class="fas fa-user-edit"></i>  <span>Areas</span>
    </a>
    @endcan

    @can('ver-autor')
    <a class="nav-link" href="/autores">
        <i class="fas fa-user-edit"></i>  <span>Autores</span>
    </a>
    @endcan

    
    @can('ver-libro')
    <a class="nav-link" href="/libros">
        <i class="fa fa-book f-left" ></i><span>Libros</span>
    </a>
    @endcan

    @can('ver-asignaautor')
    <a class="nav-link" href="/asignaautores">
        <i class="fa fa-book f-left" ></i><span>Asignacion de Autor(s)</span>
    </a>
    @endcan
</li>