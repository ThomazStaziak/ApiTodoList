<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/listar-tarefas', array('middleware' => 'cors', 'uses' => 'Api\TarefasController@show'));
Route::post('/adicionar-tarefa', array('middleware' => 'cors', 'uses' => 'Api\TarefasController@add'));
Route::put('/atualizar-tarefa/{id}', array('middleware' => 'cors', 'uses' => 'Api\TarefasController@update'));
Route::delete('/deletar-tarefa/{id}', array('middleware' => 'cors', 'uses' => 'Api\TarefasController@delete'));
