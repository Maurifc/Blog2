<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Requests\ContatoRequest;
use App\Libs\Alert;

class ContatoController extends Controller
{
  //Mostra o form para envio de emails para contato
  public function mostrarForm(){
    try{
      $dados = [
        'aba' => 1
      ];

      return view('blog.contato', compact('dados'));
    } catch (\Exception $e){
      Alert::danger('Falha ao processar a requisição');
      return redirect()->route('post.index');
    }
  }

  //Envia o email para contato
  public function enviarEmail(ContatoRequest $request){
    //Envio de email não implementado

    try{
      Alert::success("Mensagem enviada com sucesso, aguarde nosso contato.");
    } catch (\Exception $e){
      Alert::danger('Falha ao processar a requisição');
    }

    return redirect()->route('post.index');
  }
}
