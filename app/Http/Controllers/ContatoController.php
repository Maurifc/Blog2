<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Requests\ContatoRequest;

class ContatoController extends Controller
{
  //Mostra o form para envio de emails para contato
  public function mostrarForm(){
    return view('blog.contato');
  }

  //Envia o email para contato
  public function enviarEmail(ContatoRequest $request){
    //Envio de email não implementado

    //Envia mensagem de sucesso
    \Session::flash('flash_message', [
      'msg' => 'Mensagem enviada com sucesso, aguarde nosso contato.',
      'class' => 'alert-success'
    ]);

    return view('blog.contato');
  }
}
