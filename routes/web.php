<?php

use Illuminate\Support\Facades\Route;
use App\Escuela;
use App\Equipamiento;

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
    //$escuelas = Escuela::all();
    //$equipamiento = Equipamiento::all();
    //return view('inicio')->with('escuelas', $escuelas)->with('equipamiento', $equipamiento);
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