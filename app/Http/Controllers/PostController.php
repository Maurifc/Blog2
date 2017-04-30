<?php

namespace App\Http\Controllers;

use App\Post;
use App\Categoria;
use App\Libs\Alert;
use DB;
use Illuminate\Http\Request;


class PostController extends Controller
{
  //Exibe todos os posts
  public function index(){
    try{
      $posts = Post::orderBy('dataFantasia', 'desc')->paginate(6);

      return $this->mostrar($posts);
    } catch (\Exception $e){
      Alert::danger('Falha ao processar a requisição');
      return redirect()->route('post.index');
    }
  }

  //Exibe posts por categoria
  public function mostraPorCategoria($id){
    try{
      $posts = Post::where('categoria_id', $id)->
      orderBy('dataFantasia', 'desc')->paginate(6);


      return $this->mostrar($posts);
    } catch (\Exception $e){
      Alert::danger('Falha ao processar a requisição');
      return redirect()->route('post.index');
    }
  }

  //Exibe os posts informados no parametro
  public function mostrar($posts){
    $dados = [
      'aba' => 0
    ];

    $categorias = Categoria::all();
    return view('blog.inicio', compact(['posts', 'categorias', 'dados']));
  }

  //Carrega a view de exibição de post
  public function mostrarPost($id){
    try{
      $post = Post::findOrFail($id);
      $categorias = Categoria::all();

      return view('blog.post', compact(['post', 'categorias']));
    } catch (\Exception $e){
      Alert::danger('Falha ao processar a requisição');
      return redirect()->route('post.index');
    }
  }



}
