<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\Admin\NoticiaController as AdminNoticiaController;
use App\Http\Controllers\Admin\TableroController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Registro de rutas de autenticacion
require __DIR__.'/auth.php';


//Rutas de noticias
Route::get('/', [InicioController::class, "index"]);
Route::get('/contacto', [InicioController::class, "contacto"]);

Route::get('/noticias', [NoticiaController::class, "lista"])->name("noticias");
Route::get('/noticias/{id}', [NoticiaController::class, "detalles"])->name("noticias.detalles");

//Rutas del admin noticias
//Recurso
//+Crear *create - GET
//+Almacenar *store - POST
//+Listar *index - GET
//-Mostrar detalles *show - GET
//-Actualizar *update - GET
//-Editar *edit -P PUT
//-Eliminar *delete/destroy - DELETE

Route::get("/admin/noticias", [AdminNoticiaController::class, "index"])->middleware("auth")->name("admin.noticias.index");
Route::get("/admin/noticias/create", [AdminNoticiaController::class, "create"])->name("admin.noticias.create");
Route::post("/admin/noticias", [AdminNoticiaController::class, "store"])->name("admin.noticias.store");
Route::get("/admin/noticias/{id}/edit", [AdminNoticiaController::class, "edit"])->name("admin.noticias.edit");
Route::put("/admin/noticias/{id}", [AdminNoticiaController::class, "update"])->name("admin.noticias.update");
Route::get("/admin/noticas/{id}/confirmdelete", [AdminNoticiaController::class, "confirmdelete"])->name("admin.noticias.confirmdelete");
Route::delete("/admin/noticias/{id}", [AdminNoticiaController::class, "destroy"])->name("admin.noticias.destroy");
Route::get("/admin/noticias/{id}", [AdminNoticiaController::class, "show"])->name("admin.noticias.show");
Route::get("/admin/blank", [AdminNoticiaController::class, "blank"])->name("admin.blank");

//Tablero
Route::get("/admin", [TableroController::class, "tablero"])->name("admin.tablero");