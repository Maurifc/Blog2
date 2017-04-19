<?php

namespace App\Http\Controllers;

use App\Post;
use App\Categoria;
use DB;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
    	$posts = Post::orderBy('dataFantasia', 'desc')->paginate(6);
    	$categorias = Categoria::all();

    	return view('blog.inicio', compact(['posts', 'categorias']));
    }

    //Carrega a view de exibição de post
    public function mostrar($id){
    	$post = Post::find($id);
    	$categorias = Categoria::all();

    	return view('blog.post', compact(['post', 'categorias']));
    }

   //Exibe posts por categoria
    public function mostraPorCategoria($id){
      $posts = Post::where('categoria_id', $id)->
                        orderBy('dataFantasia', 'desc')->paginate(6);

      $categorias = Categoria::all();

      return view('blog.inicio', compact(['posts', 'categorias']));
    }
}
