<?php
use App\categoria;
use App\pelicula;
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
//   $peliculas = pelicula::all();
//     return view('index', compact('peliculas'));
// });


Route::get('/', 'clienteController@index')->name('cliente');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('cms', 'cmsController')->middleware('auth');

Route::resource('cliente', 'clienteController')->middleware('auth');



Route::get('/registroPeliculas', function ()
{
  $categorias = categoria::all();
  return view('admin.registroPeliculas', compact('categorias'));
})->middleware('auth');

Route::get('/pelicula/{id}/confirmar','cmsController@confirmar')->name('cms.confirmar');
