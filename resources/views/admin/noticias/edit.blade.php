<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar noticia: {{ $noticia->id }}</title>
</head>
<body>
    <a href="{{ route("admin.noticias.index")}} ">Volver a lista de noticias</a>
    @if(Session::has("exito"))
        <p style="color: green">{{Session::get("exito")}}</p>
    @endif
    @if(Session::has("error"))
        <p style="color: red">{{Session::get("exito")}}</p>
    @endif
    <h1>Editar noticia: {{ $noticia->id }}</h1>
    <form method="POST" action="{{route("admin.noticias.update", $noticia->id)}}">
        @csrf
        @method('put')
        <label>Título:</label>
        <input name="titulo" type="text" value="{{ $noticia->titulo }}">
        <label>Fecha:</label>
        <input name="fecha" type="date" value="{{ $noticia->fecha }}">
        <label>Autor:</label>
        <input name="autor" type="text" value="{{ $noticia->autor }}">
        <label>Cuerpo:</label>
        <textarea name="cuerpo" rows="5">{{ $noticia->cuerpo }}</textarea>
        <label>Foto:</label>
        <input name="foto" type="text" value="{{ $noticia->foto }}">
        <button type="submit">Actualizar noticia</button>
    </form>
</body>
</html>