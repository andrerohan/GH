<?php

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
    return view('layouts.GH.dashboard');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index')->name('home');

Route::resource('/users', 'UserController')->except(['show']);
Route::resource('/servicos', 'ServicoController')->except(['show']);
Route::resource('/turnos', 'TurnoController')->except(['show']);
Route::resource('/horarios', 'HorarioController')->except(['show']);;
Route::resource('/horarios/servico', 'HorarioController');
Route::resource('/HUTs', 'HorarioUserTurnoController');
Route::get('/HUTs', ['as' => 'HUTs', 'uses' => 'HorarioUserTurnoController@update']);
