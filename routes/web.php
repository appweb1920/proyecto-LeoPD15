<?php

use Illuminate\Support\Facades\Route;
use App\Uniforme;
use App\Equipamiento;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::redirect('/', 'loginLU');
Route::redirect('/home', 'inicio');

Route::get('/loginLU', function(){
    if(is_null(Auth::user()))

        return view('login');
    else
        return redirect('/inicio');
});



Route::get('/inicio', function(){   
    $uniformes = Uniforme::all();
    $equipamiento = Equipamiento::all();
    return view('inicio')->with('uniformes', $uniformes)->with('equipamiento', $equipamiento);
    //return view('inicio');

});

/*----------------RUTAS GET----------------*/
Route::get('/usuarios', 'UsuariosController@index');
Route::get('/Cotizar', 'ContizacionController@index');
Route::get('/Ventas', 'VentasController@index');
//Eliminaciones
Route::get('/usuarios/elimina/{id}', 'UsuariosController@destroy');
Route::get('/Escuelas/elimina/{id}', 'EscuelaController@destroy');
Route::get('/Uniforme/elimina/{id}', 'UniformeController@destroy');
Route::get('/Equipamiento/elimina/{id}', 'EquipamientoController@destroy');
Route::get('/Uniforme/elimina/{id}', 'UniformeController@destroy');
Route::get('/talla/Eliminar/{id}', 'TallaController@destroy');

//Mostrar elemento especifico
Route::get('/uniforme/tallas/{id}', 'TallaController@show');
Route::get('/Uniforme/{id}', 'UniformeController@show');
Route::get('/Equipamiento/{id}', 'EquipamientoController@show');

//Mostrar formulario de creacion
Route::get('/registro/Equipamiento', 'EquipamientoController@create');
Route::get('/registro/Uniforme', 'UniformeController@create');
Route::get('/Escuelas', 'EscuelaController@create');


//Edicion
Route::get('/Uniforme/editar/{id}', 'UniformeController@edit');
Route::get('/Equipamiento/editar/{id}', 'EquipamientoController@edit');


//Rutas POST
Route::post('/registroUsuario', 'UsuariosController@store');
Route::post('/registro/Uniforme/Guardar', 'UniformeController@store');
Route::post('/Escuelas/Guardar', 'EscuelaController@store');
Route::post('/Talla/Guardar', 'TallaController@store');
Route::post('/Venta/Uniforme', 'VentaUniformeController@store');
Route::post('/Venta/Equipamiento', 'VentaEquipamientoController@store');
Route::post('/Talla/editar', 'TallaController@update');
Route::post('/Equipamiento/guardar', 'EquipamientoController@store');
Route::post('/Uniforme/edicion/guardar', 'UniformeController@update');
Route::post('/Equipamiento/edicion/guardar', 'EquipamientoController@update');
