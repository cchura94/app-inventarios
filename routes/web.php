<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('inicio');
});

Route::get('/hola', function(){
    echo "Hola desde las rutas de Laravel";
});

Route::get('/saludo2', function(){
    return "saludo desde laravel";
});

Route::get("/nombres", function(){
    return ["Juan", "Pedro", "Maria", "Pablo"];
});

Route::get("/nombre/{n}/edad/{e}", function($nombre, $edad){
    return ["nombre" => $nombre, "edad" => $edad];
});

Route::get("/contacto", function(){
    return view("contactenos");

});

Route::get("/nosotros", function(){
    return view("nosotros");
});

Route::get('/categoria/buscar', 'CategoriaController@buscar');

Route::get("/persona", "PersonaController@listar")->name("persona_listar");
Route::get("/persona/crear", "PersonaController@crear")->name("persona_crear");
Route::get("/persona/{id}", "PersonaController@mostrar")->name("persona_mostrar");
Route::get("/persona/{id}/editar", "PersonaController@editar")->name("persona_editar");

Route::resource("/categoria", "CategoriaController")->middleware("auth");

Route::resource("/proveedor", "ProveedorController")->middleware("auth");
Route::resource("/producto", "ProductoController")->middleware("auth");
Route::resource("/usuario", "UsuarioController")->middleware("auth");

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
