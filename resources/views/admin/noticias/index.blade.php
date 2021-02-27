@extends('layouts.admin')
@section('contenido_principal')
    <h1>Lista de noticias</h1>
    @if(Session::has("exito"))
        <p style="color: green"> {{ Session::get("exito") }} </p>
    @endif
    @if(Session::has("error"))
        <p style="color: red"> {{ Session::get("error") }}</p>
    @endif
    <a href="{{ route("admin.noticias.create") }}">Crear nueva noticia</a>
    <table class="table table-bordered">
        <thead>
            <th>Titulo</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @foreach($noticias as $noticia)
                <tr>
                    <td>{{ $noticia->titulo }}</td>
                    <td>
                        <a href="{{ route("admin.noticias.show", $noticia->id) }}">Ver</a>
                        <a href="{{ route("admin.noticias.edit", $noticia->id) }}">Editar</a>
                        <button class="btn btn-xs btn-danger" type="button" data-toggle="modal" data-target="#confirmarEliminacion{{$noticia->id}}">Eliminar</button>
                        <div class="modal fade" id="confirmarEliminacion{{$noticia->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Confirmación de eliminación de noticia: {{$noticia->id}}</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p>¿Esta seguro de eliminar la noticia: "{{$noticia->titulo}}"?</p>
                                </div>
                                <div class="modal-footer">
                                  <form method="POST" action="{{route("admin.noticias.destroy", $noticia->id)}}">
                                    @csrf 
                                    @method('delete') 
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection