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

Route::get('/', function(){
    return view('index');
});

/* PRODUTOS */

/* GET*/
Route::get('listar-produtos', ['as' => 'listar-produtos', 'uses' => 'ProdutosController@ListarProdutos']);
Route::get('deletar-produto/{id}', ['as' => 'deletar-produto', 'uses' => 'ProdutosController@DeletarProduto']);
Route::get('duplicar-produto/{id}', ['as' => 'duplicar-produto', 'uses' => 'ProdutosController@DuplicarProduto']);

Route::get('listar-modelos', ['as' => 'listar-modelos', 'uses' => 'ModelosController@ListarModelos']);
Route::get('listar-modelo/{id}', ['as' => 'listar-modelo', 'uses' => 'ModelosController@SelecionarModelo']);
Route::get('deletar-modelo/{id}', ['as' => 'deletar-modelo', 'uses' => 'ModelosController@DeletarModelo']);

/* POST */
Route::post('cadastrar-produto', ['as' => 'cadastrar-produto', 'uses' => 'ProdutosController@CadastrarProdutos']);
Route::post('cadastrar-modelo', ['as' => 'cadastrar-modelo', 'uses' => 'ModelosController@CadastrarModelo']);
