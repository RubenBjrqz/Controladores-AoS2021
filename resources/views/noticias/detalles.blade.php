<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@if($noticia != NULL) {{ $noticia->titulo }} @else Noticia no encontrada @endif</title>
</head>
<body>
    <a href="{{route("noticias")}}">Volver a noticias</a>
    @if($noticia != NULL)
        <h1>{{ $noticia->titulo }}</h1>
        <p>{{ $noticia->fecha }}</p>
        <h4>{{ $noticia->autor }}</h4>
        @if($noticia->foto !=NULL)
            <img src="{{ $noticia->foto }}" style="width: 500px; height: auto;" />
        @endif
        <p>{{ $noticia->cuerpo }}</p>
    @else
        <h1>Lo sentimos, no se encontró la noticia que buscas</h1>
    @endif
</body>
</html>