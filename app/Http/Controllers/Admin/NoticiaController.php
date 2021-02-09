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
            return redirect()->route("admin.noticias.index")->
                with("exito", "Se agregó la noticia exitosamente");
                
        }
        return redirect()->route("admin.noticias.index")->
            with("error", "No se pudo agregar noticia");
    }

    public function edit($id) {
        $noticia = Noticia::find($id);

        $argumentos = array();
        $argumentos["noticia"] = $noticia;

        return view("admin.noticias.edit", $argumentos);

    }

    public function update(Request $request, $id) {
        $noticia = Noticia::find($id);
        $noticia->titulo = $request->input("titulo");
        $noticia->fecha = $request->input("fecha");
        $noticia->autor = $request->input("autor");
        $noticia->cuerpo = $request->input("cuerpo");
        $noticia->foto = $request->input("foto");
        if($noticia->save()){
            return redirect()->route("admin.noticias.edit", $noticia->id)->
                with("exito", "Se actualizó la noticia");
        }
        return redirect()->route("admin.noticias.edit", $noticia->id)->
            with("error", "No se pudo actualizar noticia");

    }
}
