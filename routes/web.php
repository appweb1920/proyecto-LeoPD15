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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/loginLU', function(){
    return view('login');
});

Route::get('/usuarios', 'UsuariosController@index');

Route::get('/inicio', function(){   
    return view('inicio');
});

Route::get('/registroUniforme', function(){
    return view('registroUniforme');
});

Route::post('/registroUsuario', 'UsuariosController@store');
Route::get('/usuarios/elimina/{id}', 'UsuariosController@destroy');