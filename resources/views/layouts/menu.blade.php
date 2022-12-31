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

    @can('ver-libro')
    <a  href="{{ route('libros.create') }}">
        <i class="fa fa-book f-left" ></i><span>Crear Libro</span>
    </a>  
    <a class="nav-link" href="/libros">
        <i class="fa fa-book f-left" ></i><span>Lista de Libros</span>
    </a>
    @endcan
    @can('ver-ejemplar')
    <a class="nav-link" href="/ejemplares">
        <i class="fa fa-book f-left" ></i><span>Ejemplares</span>
    </a>
    @endcan
    @can('ver-prestamo')
    <a class="nav-link" href="/prestamos">
        <i class="fa fa-book f-left" ></i><span>Prestamos</span>
    </a>
    @endcan
<!--
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

-->  



</li>