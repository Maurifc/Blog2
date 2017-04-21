<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Post;
use App\User;
use App\Categoria;

class AdminController extends Controller
{
  //Somente usuários autenticados podem usar funções desse controller
  public function __construct()
  {
      $this->middleware('auth');
  }

  //Página inicial do painel admin
  public function index(){
    $posts = \App\Post::all();

    return view('admin.index', compact('posts'));
  }
  //View para cadastrar novo Post
  public function cadastrarPost(){
    $dados = [
      'rota' => route('admin.salvar.post'),
      'botaoSubmit' => 'Cadastrar'
    ];

    $categorias = Categoria::all();

    return view('admin.post', compact(['dados', 'categorias']));
  }

  //Salvar um post no banco de dados
  public function salvarPost(PostRequest $request){
    //$data = DB::raw("STR_TO_DATE('".$request->input('dataFantasia')."', '%d/%m/%Y %h:%i'");
    $data = new \DateTime($request->input('dataFantasia'));
    //$data = DateTime::createFromFormat('m-d-Y', '10-16-2003')->format('Y-m-d');

    //Cria o objeto Post
    $post = new Post;
    $post->titulo = $request->input('titulo');
    $post->texto = $request->input('texto');
    $post->dataFantasia = $data->format('Y-m-d H:i:s');
    $post->bloqueado = $request->input('bloqueado');
    $post->categoria_id = $request->input('categoria');
    $post->usuario_id = \Auth::user()->id;

    if($post->save()){
      \Session::flash('flash_message', [
        'msg' => "Post cadastrado com sucesso!",
        'class' => "alert-success"
      ]);

      return redirect()->route('admin.index');
    } else {
      \Session::flash('flash_message', [
        'msg' => "Erro ao cadastrar o post",
        'class' => "alert-danger"
      ]);
    }

    return redirect()->route('admin.cadastrar.post');
  }

  //View para alteração de um post
  public function alterarPost($id){
    $post = Post::find($id);

    return view('admin.editarPost');
  }

}
