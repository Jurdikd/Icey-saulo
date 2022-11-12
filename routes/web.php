<?php

use App\Http\Controllers\CursoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\SolicitudeController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ParroquiaController;
use App\Http\Controllers\CursanteController;
use App\Http\Controllers\FacilitadorController;
use App\Http\Controllers\DireccionController;
use App\Http\Controllers\AprobadoController;
use App\Http\Controllers\EspacioController;
use Illuminate\Routing\RouteGroup;
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
//ruta principal
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();


//ruta redirecciona luego del login
Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [InicioController::class, 'index'])->name('home');
});
           //url                      clase y metodo                     name: como lo llamas en la vista
Route::get('/home', [InicioController::class, 'index'])->middleware('auth')->name('home');

Route::resource('estados', App\Http\Controllers\EstadoController::class)
->name('index', 'estados')->middleware('auth');

Route::get('filtro', [EstadoController::class, 'autocompleteSearch']);

Route::resource('municipios', App\Http\Controllers\MunicipioController::class)
->name('index', 'municipios')->middleware('auth');

Route::resource('parroquias', App\Http\Controllers\ParroquiaController::class)
->name('index', 'parroquias')->middleware('auth');

Route::resource('espacios', App\Http\Controllers\EspacioController::class)
->name('index', 'espacios')->middleware('auth');

Route::resource('facilitadores', App\Http\Controllers\FacilitadorController::class)
->name('index', 'facilitadors')->middleware('auth');

Route::resource('cursantes', App\Http\Controllers\CursanteController::class)
->name('index', 'cursantes')->middleware('auth');

Route::resource('cursos', App\Http\Controllers\CursoController::class)
->name('index', 'cursos')->middleware('auth');

Route::resource('solicitud_cursante', App\Http\Controllers\SolicitudCursanteController::class)
->name('index', 'solicitudes_cursante')->middleware('auth');

Route::resource('solicitudes_facilitador', App\Http\Controllers\SolicitudeController::class)
->name('index', 'solicitude')->middleware('auth');

Route::get('aprobar_solicitud/{solicitud}',[App\Http\Controllers\SolicitudeController::class, 'aprobar_solicitud'])->name("aprobar_solicitud");

Route::post('formalizar_solicitud',[App\Http\Controllers\SolicitudeController::class,'formalizarSolicitud'])->name("formalizar_solicitud");

Route::resource('aprobados', App\Http\Controllers\AprobadoController::class)
->name('index', 'aprobados')->middleware('auth');


