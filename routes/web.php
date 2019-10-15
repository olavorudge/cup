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

//GET

Route::get('/login', 'HomeController@getLogIn')->name('login');

Route::get('/recuperar-senha', 'HomeController@getRecuperarSenha')->name('recuperar-senha');

Route::get('/logout', 'HomeController@getLogOut')->name('logout');

Route::get('/usuarios', 'HomeController@getUsuarios')
    ->name( 'usuarios' );
    //->middleware( 'sidebar' );

Route::get('/usuario', 'HomeController@getCadastrarUsuario')
    ->name( 'cadastrar-usuario' );
    //->middleware( 'sidebar' );

Route::get('/usuario/{id}', 'HomeController@getEditarUsuario')
    ->name( 'editar-usuario' );
    //->middleware( 'sidebar' );

Route::get('/', 'HomeController@index')
    ->name( 'home' );
    //->middleware( 'sidebar' );

Route::get('/linha-produto/{id}', 'HomeController@getLinhaProduto')
    ->name( 'sublinha' );
    //->middleware( 'sidebar' );

Route::get('/cadastrar-produto', 'HomeController@getCadastrarProduto')
    ->name('cadastrar');
    ///->middleware( 'sidebar' );

Route::get('/editar-produto/{id}', 'HomeController@getEditarProduto')
    ->name('editar');
    //->middleware( 'sidebar' );

Route::get('/produtos', 'HomeController@getListarProdutos')
    ->name('produtos');
    //->middleware( 'sidebar' );

Route::get('/estruturas', 'HomeController@getListarProdutos')
    ->name('estruturas');
    ///->middleware( 'sidebar' );

Route::get('produtos/todos', 'HomeController@getListarProdutos')
    ->name('produtos-todos');

Route::get('/pendencias', 'HomeController@getListarPendencias')
    ->name('pendencias');
    //->middleware( 'sidebar' );

Route::get('/pendencias', 'HomeController@getListarPendencias')
    ->name('pendencias');
    //->middleware( 'sidebar' );

Route::get('/pendencias/geral', 'HomeController@getListarPendencias')
->name('pendencias-geral');
//->middleware( 'sidebar' );

Route::get('/pendencias/especificacoes', 'HomeController@getListarPendencias')
->name('pendencias-especificacoes');
//->middleware( 'sidebar' );

Route::get('/buscar-produto', 'HomeController@getBuscarProduto')
    ->name('buscar-produto');
    //->middleware( 'sidebar' );

Route::get('/modelos', function() {
    return view('modelos');
})->name('modelos');

Route::get('/cadastrar-modelo', function() {
    return view('cadastrar-modelo');
})->name('cadastrar-modelo');

Route::get('/vue', function(){
    return view('index');
});

//POST

Route::post('/cadastrar-produto', 'HomeController@postCadastrarProduto')->name('post-cadastrar-produto');