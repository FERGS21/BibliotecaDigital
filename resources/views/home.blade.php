@extends('layouts.app')
@section('title')
    Inicio
@endsection
@section('content')

    <section class="section">

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">                         
                                <div class="row">
                                    <a href="/home">TODAS</a>  
                                    @foreach($areas as $area)
                                        <a href="" class="ml-4">{{$area->nombre_area}}</a>
                                    @endforeach
                                </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    

                    <div class="card">
                            <div class="card-body">   
                            <!-- Ubicamos la paginacion a la derecha -->
                            <div class="pagination justify-content-end">
                                {!! $ejemplares->links() !!}
                            </div>
                            <div class="row"> 
                                @foreach($ejemplares as $ejemplar)
                                    <div class="col-md-3 col-xl-3">
                                        <div class="card bg-c-gray black-card">
                                            <div class="card-block">
                                                <h6>{{$ejemplar->libro->titulo}}</h5> 
                                                @foreach ($imagenes as $imagen)
                                                    @if($imagen->id == $ejemplar->libro->id)
                                                    <img src="images/{{$imagen->image}}" class="img-responsive" style="max-height:200px; max-width:200px">
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div> 
                                    </div> 
                                @endforeach         
                            </div>
                            <div class="card-body">   
                            <!-- Ubicamos la paginacion a la derecha -->
                            <div class="pagination justify-content-end">
                                {!! $ejemplares->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection