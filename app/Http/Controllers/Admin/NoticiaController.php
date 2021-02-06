<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Noticia;

class NoticiaController extends Controller
{
    public function index () {
        $noticias = Noticia::all();

        $argumentos = array();
        $argumentos["noticias"] = $noticias;
        return view("admin.noticias.index", $argumentos);
    }

    //Formulario de creación de noticias
    public function create() {
        return view("admin.noticias.create");
    }

    //Almacenar una nueva noticia en la BD
    public function store(Request $request) {
        $nuevaNoticia = new Noticia();
        $nuevaNoticia->titulo = $request->input("titulo");
        $nuevaNoticia->fecha = $request->input("fecha");
        $nuevaNoticia->autor = $request->input("autor");
        $nuevaNoticia->cuerpo = $request->input("cuerpo");
        $nuevaNoticia->foto = $request->input("foto");

        if($nuevaNoticia->save()) {
            return "Se guardó la nueva noticia";
        }
        return "Algo salió mal";
    }
}
