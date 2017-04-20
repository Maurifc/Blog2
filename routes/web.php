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
/*
Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

//Route::get('/home', 'HomeController@index');

/*
| Blog
*/
//Página inicial
Route::get('/', ['uses' => 'PostController@index', 'as' => 'post.index']);

//Exibir um post (view)
Route::get('/post/{id}', ['uses' => 'PostController@mostrar', 'as' => 'post.mostrar']);

//Exibe posts somente de umad eterminada categoria
Route::get('/posts/categoria/{id}', ['uses' =>
  'PostController@mostraPorCategoria', 'as' => 'post.categoria']);

//Exibe a página de contato
Route::get('/contato', ['uses' => 'ContatoController@mostrarForm', 'as' =>
                                                      'contato.form']);

//Envia o email de contato
Route::post('/contato/enviaremail', ['uses' => 'ContatoController@enviarEmail',
                                                'as' => 'contato.enviaremail']);
