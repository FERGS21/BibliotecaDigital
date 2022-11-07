@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Inicio</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">                          
                                <div class="row">
                                    @can('ver-usuario')
                                    <div class="col-md-3 col-xl-3">
                                        <div class="card bg-c-blue order-card">
                                            <div class="card-block">
                                            <h5>Usuarios</h5>   
                                    @endcan                                            
                                                @php
                                                 use App\Models\User;
                                                $cant_usuarios = User::count();                                                
                                                @endphp
                                    @can('ver-usuario')
                                                <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{$cant_usuarios}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/usuarios" class="text-white">Ver más</a></p>
                                            </div>                                            
                                        </div>                                    
                                    </div>
                                    @endcan 
                                   
                                    @can('ver-rol')
                                    <div class="col-md-3 col-xl-3">
                                        <div class="card bg-c-green order-card">
                                            <div class="card-block">
                                            <h5>Roles</h5> 
                                    @endcan
                                                @php
                                                use Spatie\Permission\Models\Role;
                                                 $cant_roles = Role::count();                                                
                                                @endphp
                                    @can('ver-rol')
                                                <h2 class="text-right"><i class="fa fa-user-lock f-left"></i><span>{{$cant_roles}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/roles" class="text-white">Ver más</a></p>  
                                            </div>
                                        </div>
                                    </div>                                                                
                                    @endcan
                                    @can('ver-persona')
                                    <div class="col-md-3 col-xl-3">
                                        <div class="card bg-c-pink order-card">
                                            <div class="card-block">
                                                <h5>Personas</h5>
                                      @endcan                                             
                                                @php
                                                 use App\Models\Persona;
                                                $cant_personas = Persona::count();                                                
                                                @endphp
                                    @can('ver-persona')
                                                <h2 class="text-right"><i class="fa fa-blog f-left"></i><span>{{$cant_personas}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/personas" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>@endcan
                                    @can('ver-area')
                                    <div class="col-md-3 col-xl-3">
                                        <div class="card bg-c-orange order-card">
                                            <div class="card-block">
                                                <h5>Areas</h5> @endcan                                              
                                                @php
                                                 use App\Models\Area;
                                                $cant_areas = Area::count();                                                
                                                @endphp 
                                                @can('ver-area')
                                                <h2 class="text-right"><i class="fa fa-blog f-left"></i><span>{{$cant_areas}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/areas" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>@endcan
                                    @can('ver-autor')
                                    <div class="col-md-3 col-xl-3">
                                        <div class="card bg-c-pink order-card">
                                            <div class="card-block">
                                                <h5>Autores</h5>@endcan                                               
                                                @php
                                                 use App\Models\Autore;
                                                $cant_autores = Autore::count();                                                
                                                @endphp
                                                @can('ver-autor')
                                                <h2 class="text-right"><i class="fa fa-blog f-left"></i><span>{{$cant_autores}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/areas" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>@endcan
                                    @can('ver-edicion')
                                    <div class="col-md-3 col-xl-3">
                                        <div class="card bg-c-orange order-card">
                                            <div class="card-block">
                                                <h5>Ediciones</h5> @endcan                                              
                                                @php
                                                 use App\Models\Edicione;
                                                $cant_ediciones = Edicione::count();                                                
                                                @endphp 
                                                @can('ver-edicion')
                                                <h2 class="text-right"><i class="fa fa-blog f-left"></i><span>{{$cant_ediciones}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/areas" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>@endcan

                                    @can('ver-editorial')
                                    <div class="col-md-3 col-xl-3">
                                        <div class="bg-c-blue order-card">
                                            <div class="card-block">
                                                <h5>Editoriales</h5>  @endcan                                             
                                                @php
                                                 use App\Models\Editoriale;
                                                $cant_editoriales = Editoriale::count();                                                
                                                @endphp @can('ver-editorial')
                                                <h2 class="text-right"><i class="fa fa-blog f-left"></i><span>{{$cant_editoriales}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/areas" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>@endcan
                                    @can('ver-libro')
                                    <div class="col-md-3 col-xl-3">
                                        <div class="bg-c-blue order-card">
                                            <div class="card-block">
                                                <h5>Libros</h5>  @endcan                                             
                                                @php
                                                 use App\Models\Libro;
                                                $cant_libros = Libro::count();                                                
                                                @endphp @can('ver-libro')
                                                <h2 class="text-right"><i class="fa fa-address-book"></i>
                                                <span>{{$cant_libros}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/libros" class="text-white">Ver más</a></p>
                                                
                                            </div>
                                        </div>
                                    </div>@endcan
                                </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection