<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class AdminController extends Controller
{
  //Somente usuários autenticados podem usar funções desse controller
  public function __contructor(){
    $this->middleware('auth');
  }

  //Página inicial do painel admin
  public function index(){
    $posts = \App\Post::all();

    return view('admin.index', compact('posts'));
  }

  //View para alteração de um post
  public function alterarPost($id){
    $post = Post::find($id);

    return view('admin.editarPost');
  }
}
