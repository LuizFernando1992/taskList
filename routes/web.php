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

/**Rota inicial */
Route::get('/','IndexController@store');

/**Rota para exibir formulario de inserção */
Route::get('index/task/form','IndexController@exibirForm');
/**Rota para exibir formulario de alteração */
Route::post('index/task/form/alt','IndexController@exibirFormAlterar');
/**Rota para criar nova tarefa */
Route::post('index/task/create', 'TaskController@create');
/**Rota para alterar uma tarefa */
Route::post('index/task/update', 'TaskController@update');
/**Rota para excluir uma tarefa */
Route::delete('index/task/delete', 'TaskController@delete');
