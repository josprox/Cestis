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
    return view('welcome');
});

Auth::routes(["register" => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Hooks - Do not delete//
	Route::view('notifications', 'livewire.notifications.index')->middleware('auth');
	Route::view('classmodels', 'livewire.classmodels.index')->middleware('auth');
	Route::view('argalumnos', 'livewire.argalumnos.index')->middleware('auth');
	Route::view('argmaestros', 'livewire.argmaestros.index')->middleware('auth');
	Route::view('argpublics', 'livewire.argpublics.index')->middleware('auth');
	Route::view('arg_publics', 'livewire.arg_publics.index')->middleware('auth');
	Route::view('gradgrups', 'livewire.gradgrups.index')->middleware('auth');
	Route::view('sexos', 'livewire.sexos.index')->middleware('auth');
	Route::view('descargas', 'livewire.descargas.index')->middleware('auth');
	Route::view('publicaciones', 'livewire.publicaciones.index')->middleware('auth');
	Route::view('especialidades', 'livewire.especialidades.index')->middleware('auth');
	Route::view('anuncios', 'livewire.anuncios.index')->middleware('auth');
	Route::view('turnos', 'livewire.turnos.index')->middleware('auth');
	Route::view('maestros', 'livewire.maestros.index')->middleware('auth');
	Route::view('usuarios', 'livewire.usuarios.index')->middleware('auth');
	Route::view('numcontrols', 'livewire.numcontrols.index')->middleware('auth');