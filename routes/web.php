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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('cms', 'cmsController');

Route::get('/registroPeliculas', function ()
{
     $categorias = categoria::all();
  return view('admin.registroPeliculas', compact('categorias'));
});
