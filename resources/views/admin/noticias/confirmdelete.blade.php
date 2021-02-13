<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmar eliminacion</title>
</head>
<body>
    <a href="{{ route("admin.noticias.index")}} ">Volver a lista de noticias</a>
    <h1>Confirmar eliminacion de noticia: {{ $noticia->id }}</h1>
    <p>¿Esta seguro de eliminar la noticia: {{ $noticia->titulo }}?</p>
    <form action="POST" action=" {{route("admin.noticias.destroy", $noticia->id)}} ">
        @csrf
        @method("delete")
        <a href="{{ route("admin.noticias.index") }}"><button type="button">Cancelar</button></a>
        <button type="submit">Confirmar</button>
    </form>
</body>
</html>