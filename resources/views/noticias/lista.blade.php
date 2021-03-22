@extends('layouts.listanoticias')
@section("title1", "Noticias")
@section('contenido_principal1')
    @foreach($noticias as $noticia)
    <div class="post-preview">
        <a href="{{route("noticias.detalles",$noticia->id)}}">
          <h2 class="post-title">
            {{ $noticia->titulo }}
          </h2>
        </a>
        <p class="post-meta">Escrito por
          <a href="#">{{ $noticia->autor }}.</a>
            Fecha: {{ $noticia->fecha }}</p>
      </div>
      <hr>
    @endforeach
@endsection