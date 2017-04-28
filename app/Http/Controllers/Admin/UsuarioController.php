<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Libs\Alert;
use App\User;

class UsuarioController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    //Lista os usuários
    public function listar(){
      try{
        $usuarios = User::all();

        return view('admin.lista_usuarios', compact('usuarios'));
      } catch (\Exception $e){
        Alert::danger('Falha ao abrir a lista de usuários');
        return redirect()->route('admin.index');
      }
    }

    //Exibe a view para cadastro de usuários
    public function cadastrar(){
      try{
        $dados = [
          'rota' => route('register'),
          'tituloForm' => 'Cadastrar usuário',
          'botaoSubmit' => 'Cadastrar',
          'modo' => 'cadastrar'
        ];

        return view('admin.form_usuario', compact('dados'));
      } catch (\Exception $e){
        Alert::danger("Falha ao abrir o formulário de cadastro de usuário");
        return redirect()->route('admin.listar.usuarios');
      }
    }

    //Exibe a view para alteração de usuários
    public function alterar($idUsuario){
      try{
        $usuario = User::find($idUsuario);

        $dados = [
          'rota' => route('admin.atualizar.usuario', $idUsuario),
          'tituloForm' => 'Alterar usuário',
          'botaoSubmit' => 'Atualizar',
          'modo' => 'alterar'
        ];

        return view('admin.form_usuario', compact('dados', 'usuario'));
      } catch (\Exception $e){
        Alert::danger("Falha ao abrir o formulário de alteração de usuário");
        return redirect()->route('admin.listar.usuarios');
      }
    }

    //Exibe a view para alteração de usuários
    public function alterarSenha($idUsuario){
      try{
        $dados = [
          'rota' => route('admin.atualizar.senha.usuario', $idUsuario),
          'tituloForm' => 'Alterar senha',
          'botaoSubmit' => 'Alterar',
          'modo' => 'alterarSenha'
        ];

        return view('admin.form_usuario', compact('dados', 'usuario'));
      } catch (\Exception $e){
        Alert::danger("Falha ao abrir o formulário de alteração de usuário");
        return redirect()->route('admin.listar.usuarios');
      }
    }

    //Atualiza o usuário
    public function atualizar(Request $request, $idUsuario){
      try{
        $usuario = User::find($idUsuario);
        $usuario->update($request->all());

        Alert::success('Usuário atualizado com sucesso');
        return redirect()->route('admin.listar.usuarios');
      } catch (\Exception $e){
        Alert::danger("Falha ao atualizar as informações do usuário".$e);
      }

      return redirect()->route('admin.alterar.usuario', $idUsuario);
    }

    //Atualiza a senha do usuário
    public function atualizarSenha(Request $request, $idUsuario){
      try{
        $usuario = User::find($idUsuario);
        $usuario->password = bcrypt($request->input('password'));

        $usuario->update();

        Alert::success('Senha redefinida com sucesso');
        return redirect()->route('admin.listar.usuarios');
      } catch (\Exception $e){
        Alert::danger("Falha ao redefinida a senha do usuário");
        return redirect()->route('admin.alterar.senha.usuario', $idUsuario);
      }
    }

    //Bloqueia o usuário
    public function desativar($idUsuario){
      try{
        User::find($idUsuario)->desativar();
        Alert::success("Usuário desativado com sucesso!");
      } catch (\Exception $e){
        Alert::danger("Falha ao desativar o usuário".$e);
      }

      return redirect()->route('admin.listar.usuarios');
    }

    //Desbloqueia o usuário
    public function reativar($idUsuario){
      try{
        User::find($idUsuario)->ativar();
        Alert::success("Usuário reativado com sucesso!");
      } catch (\Exception $e){
        Alert::danger("Falha ao reativar o usuário");
      }

      return redirect()->route('admin.listar.usuarios');
    }

    //Exclui o usuário
    public function excluir($idUsuario){
      try{
        User::find($idUsuario)->delete();
        Alert::success("Usuário deletado com sucesso!");
      } catch (\Exception $e){
        Alert::danger("Falha ao deletar o usuário");
      }

      return redirect()->route('admin.listar.usuarios');
    }
}
