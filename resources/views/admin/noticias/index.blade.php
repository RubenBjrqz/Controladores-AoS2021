<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de noticias</title>
</head>
<body>
    <h1>Lista de noticias</h1>
    @if(Session::has("exito"))
     <p style="color: green"> {{ Session::get("exito") }} </p>
    @endif
    @if(Session::has("error"))
        <p style="color: red"> {{ Session::get("error") }}</p>
    @endif
    <a href="{{ route("admin.noticias.create") }}">Crear nueva noticia</a>
    <table>
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
                        <a href="{{ route("admin.noticias.confirmdelete", $noticia->id) }}">Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>