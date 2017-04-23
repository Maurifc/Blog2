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
| Blog
*/
//Página inicial
Route::get('/', ['uses' => 'PostController@index', 'as' => 'post.index']);

//Exibir um post (view)
Route::get('/post/{id}', ['uses' => 'PostController@mostrar', 'as' => 'post.mostrar']);

//Exibe posts somente de uma determinada categoria
Route::get('/posts/categoria/{id}', ['uses' =>
  'PostController@mostraPorCategoria', 'as' => 'post.categoria']);

//Exibe a página de contato
Route::get('/contato', ['uses' => 'ContatoController@mostrarForm', 'as' =>
                                                      'contato.form']);

//Envia o email de contato
Route::post('/contato/enviaremail', ['uses' => 'ContatoController@enviarEmail',
                                                'as' => 'contato.enviaremail']);

/*
| Painel do Administrador
*/
Auth::routes();

//logout
Route::get('/admin/logout', ['uses' => 'Auth\LoginController@logout', 'as' => 'admin.logout']);

//Index do Admin
Route::get('/admin', ['uses' => 'AdminController@index', 'as' => 'admin.index']);

//View de cadastro de posts
Route::get('/admin/cadastrar/post', 'AdminController@cadastrarPost')->name('admin.cadastrar.post');

//View para edição de post
Route::get('/admin/alterar/post/{id}', 'AdminController@editarPost')->name('admin.alterar.post');

//Salvar o post no banco de dados
Route::post('admin/salvar/post', 'AdminController@salvarPost')->name('admin.salvar.post');

//Atualizar um post no banco de dados
Route::post('admin/atualizar/post/{id}', 'AdminController@atualizarPost')->name('admin.atualizar.post');

//Remover um post do banco de dados
Route::get('admin/deletar/post/{id}', 'AdminController@deletarPost')->name('admin.deletar.post');

//View para gerenciar imagens de um Post
Route::get('admin/post/imagens/{id}', 'AdminController@postImagens')->name('admin.post.imagens');

//View para editar imagem de um Post
Route::get('admin/alterar/imagem/{id}', 'AdminController@alterarImagem')->name('admin.alterar.imagem');

//View para cadastrar imagem para um Post
Route::get('admin/cadastrar/imagem/{id}', 'AdminController@cadastrarImagem')->name('admin.cadastrar.imagem');

//Atualiza as informações de uma imagem no bd
Route::post('admin/atualizar/imagem/{id}', 'AdminController@atualizarImagem')->name('admin.atualizar.imagem');

//Remove uma imagem do bd
Route::get('admin/deletar/imagem/{id}', 'AdminController@removerImagem')->name('admin.remover.imagem');
