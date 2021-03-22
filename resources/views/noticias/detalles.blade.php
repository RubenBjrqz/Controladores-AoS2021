@extends('layouts.detallesnoticias')
@section('contenido_principal2')  
    @if($noticia != NULL)
        <!-- Page Header -->
        <header class="masthead" style="background-image: url('/assets/img/post-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-heading">
                <h1>{{ $noticia->titulo }}</h1>
                <span class="meta">Escrito por
                    <a href="#">{{ $noticia->autor }}.</a>
                    Fecha: {{ $noticia->fecha }}</span>
                </div>
            </div>
            </div>
        </div>
        </header>

        <!-- Post Content -->
        <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <p>{{ $noticia->cuerpo }}</p>
                    @if($noticia->foto !=NULL)
                        <img src="{{ $noticia->foto }}" class="img-fluid" />
                    @endif
                </div>
            </div>
        </div>
        </article>
    <hr>
    @else
        <!-- Page Header -->
        <header class="masthead" style="background-image: url('/assets/img/post-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-heading">
                <h1>Lo sentimos, no se encontró la noticia que buscas</h1>
            </div>
            </div>
        </div>
        </header>
    @endif
@endsection