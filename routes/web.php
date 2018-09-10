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
    return view('welcome');
});

Route::get('/atividades', 'AtividadeController@index');
Route::get('/atividades/create', 'AtividadeController@create');
Route::post('/atividades', 'AtividadeController@store');
Route::get('/atividades/{id}/edit', 'AtividadeController@edit');
Route::get('/atividades/{id}', 'AtividadeController@show');
Route::put('/atividades/{id}', 'AtividadeController@update');
Route::get('/atividades/{id}/delete', 'AtividadeController@delete');
Route::delete('/atividades/{id}', 'AtividadeController@destroy');


Route::get('/mensagem', 'Mensagemcontroller@index');
Route::get('/mensagem/create', 'Mensagemcontroller@create');
Route::get('/mensagem/{id}/edit', 'Mensagemcontroller@edit');
Route::post('/mensagem', 'Mensagemcontroller@store');
Route::get('/mensagem/{id}', 'Mensagemcontroller@show');
Route::put('/mensagem/{id}', 'Mensagemcontroller@update');
Route::get('/mensagem/{id}/delete', 'Mensagemcontroller@delete');
Route::delete('/mensagem/{id}', 'Mensagemcontroller@destroy');