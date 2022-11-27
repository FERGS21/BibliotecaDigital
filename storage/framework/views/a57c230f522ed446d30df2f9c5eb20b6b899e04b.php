<li class="side-menus <?php echo e(Request::is('*') ? 'active' : ''); ?>">

    <a class="nav-link" href="/home">
        <i class=" fas fa-building"></i><span>Inicio</span>
    </a>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver-usuario')): ?>
    <a class="nav-link" href="/usuarios">
        <i class=" fas fa-users"></i><span>Usuarios</span>
    </a>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver-rol')): ?>
    <a class="nav-link" href="/roles">
        <i class=" fas fa-user-lock"></i><span>Roles</span>
    </a>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver-persona')): ?>
    <a class="nav-link" href="/personas">
        <i class="fas fa-user-edit"></i>  <span>Personas</span>
    </a>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver-edicion')): ?>
    <a class="nav-link" href="/ediciones">
        <i class="fas fa-user-edit"></i>  <span>Ediciones</span>
    </a>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver-editorial')): ?>
    <a class="nav-link" href="/editoriales">
        <i class="fas fa-user-edit"></i>  <span>Editoriales</span>
    </a>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver-area')): ?>
    <a class="nav-link" href="/areas">
        <i class="fas fa-user-edit"></i>  <span>Areas</span>
    </a>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver-autor')): ?>
    <a class="nav-link" href="/autores">
        <i class="fas fa-user-edit"></i>  <span>Autores</span>
    </a>
    <?php endif; ?>

    
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver-libro')): ?>
    <a class="nav-link" href="/libros">
        <i class="fa fa-book f-left" ></i><span>Libros</span>
    </a>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver-asignaautor')): ?>
    <a class="nav-link" href="/asignaautores">
        <i class="fa fa-book f-left" ></i><span>Asignacion de Autor(s)</span>
    </a>
    <?php endif; ?>
</li><?php /**PATH C:\Users\fersa\OneDrive\Documentos\5TO SEMESTRE\TALLER DE BASE DE DATOS\BibliotecaDigital\resources\views/layouts/menu.blade.php ENDPATH**/ ?>