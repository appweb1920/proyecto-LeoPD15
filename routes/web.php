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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::redirect('/', 'loginLU');

Route::get('/loginLU', function(){
    return view('login');
});



Route::get('/inicio', function(){   
    return view('inicio');
});

//Rutas GET
Route::get('/usuarios', 'UsuariosController@index');
Route::get('/usuarios/elimina/{id}', 'UsuariosController@destroy');
Route::get('/Escuelas/elimina/{id}', 'EscuelaController@destroy');

Route::get('/registro/Uniforme', 'UniformeController@create');
Route::get('/Escuelas', 'EscuelaController@create');

Route::get('/Cotizar', function(){return view('cotizar');});
//Rutas POST
Route::post('/registroUsuario', 'UsuariosController@store');
Route::post('/registro/Uniforme/Guardar', 'UniformeController@store');
Route::post('/Escuelas/Guardar', 'EscuelaController@store');