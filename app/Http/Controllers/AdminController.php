<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Requests\ImagemRequest;
use Intervention\Image\ImageManagerStatic as Image;
use App\Libs\Alert;
use App\Post;
use App\User;
use App\Categoria;
use App\Imagem;

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

  //View para editar um Post
  public function editarPost($id){
    $post = Post::find($id);

    $dados = [
      'rota' => route('admin.atualizar.post', $id),
      'botaoSubmit' => 'Atualizar'
    ];

    $categorias = Categoria::orderBy('titulo', 'asc')->get();

    return view('admin.post', compact(['dados', 'categorias', 'post']));
  }

  //Salvar um post no banco de dados
  public function salvarPost(PostRequest $request){
    try{
      $data = \DateTime::createFromFormat("d/m/Y H:i", $request->input('dataFantasia'));

      //Cria o objeto Post
      $post = new Post;
      $post->titulo = $request->input('titulo');
      $post->texto = $request->input('texto');
      $post->dataFantasia = $data->format('Y-m-d H:i:s');
      $post->bloqueado = $request->input('bloqueado');
      $post->categoria_id = $request->input('categoria');
      $post->usuario_id = \Auth::user()->id;

      //Salvar no banco de dados
      $post->save();

      //Mensagem de sucesso
      \Session::flash('flash_message', [
        'msg' => "Post cadastrado com sucesso!",
        'class' => "alert-success"
      ]);

    } catch(\Exception $e){
      \Session::flash('flash_message', [
        'msg' => "Erro ao cadastrar o post",
        'class' => "alert-danger"
      ]);
    } finally {
      return redirect()->route('admin.cadastrar.post');
    }
  }

  //Atualizar o post no banco de dados
  public function atualizarPost(PostRequest $request, $id){
    try{
      //Cria um post a partir das requests
      $post = Post::find($id);
      $post-> dataFantasia = \DateTime::createFromFormat("d/m/Y H:i", $request->input('dataFantasia'));
      $post->titulo = $request->input('titulo');
      $post->texto = $request->input('texto');
      $post->bloqueado = $request->input('bloqueado');
      $post->categoria_id = $request->input('categoria');

      //Atualiza
      $post->save();

      //Mostra a mensagem de sucesso
      \Session::flash('flash_message', [
        'msg' => 'Post atualizado com sucesso',
        'class' => 'alert-success'
      ]);

    } catch (\Exception $e){
      //Mostra a mensagem de erro
      \Session::flash('flash_message', [
        'msg' => 'Falha ao atualizar o Post:'.$e,
        'class' => 'alert-danger'
      ]);

      return redirect()->route('admin.alterar.post', $id);
    }

    //Redireciona para o index do admin
    return redirect()->route('admin.index');
  }

  public function deletarPost($id){
    try{
      //Pega o post
      $post = Post::find($id);

      //Deleta todas as imagens referente ao Post
      $post->deletarImagens();

      //Deleta o post do banco de dados
      $post->delete();

      //Mostra a mensagem de sucesso
      \Session::flash('flash_message', [
        'msg' => 'Post deletado com sucesso',
        'class' => 'alert-success'
      ]);

    } catch (\Exception $e){

      //Mostra a mensagem de sucesso
      \Session::flash('flash_message', [
        'msg' => 'Falha ao deletar o post: '.$post->titulo.$e,
        'class' => 'alert-danger'
      ]);
    }

    return redirect()->route('admin.index');
  }

  public function postImagens($id){
    try{
      $post = Post::find($id);

      return view('admin.post_img', compact('post'));
    } catch(\Exception $e) {
      Alert::danger('Falha ao abrir as imagens do post');
    }

    return redirect()->route('admin.index');
  }

  //View para alterar dados de uma determinada imagem
  public function alterarImagem($id){
    try{
      $imagem = Imagem::find($id);

      //Dados para o formulário
      $dados = [
        'tituloPagina' => 'Alteração de imagem',
        'rotaForm' => route('admin.atualizar.imagem', $imagem->id),
        'labelSubmmit' => 'Atualizar'
      ];

      return view('admin.form_img', compact('imagem', 'dados'));
    } catch (\Exception $e) {
      Alert::danger('Falha ao abrir a imagem para alterações');
    }

    return redirect()->route('admin.post.imagens');
  }

  //Exibe a view para upload de imagem
  public function uploadImagem($id){
    try{
      $post = Post::find($id);

      $dados = [
        'tituloPagina' => 'Upload de imagem',
        'rotaForm' => route('admin.salvar.imagem', $id),
        'labelSubmmit' => 'Enviar'
      ];

      return view('admin.form_img', compact('dados', 'post'));
    } catch(\Exception $e){
      Alert::danger('Falha ao abrir sua solicitação: Upload de imagem');
    }

    return redirect()->route('admin.post.imagens', $id);
  }

  //Salva uma imagem no disco e no bd
  public function salvarImagem(ImagemRequest $request, $postId){
    try{
      //Pega o post que a imagem pertence
      $post = Post::find($postId);

      //Pega a imagem (como objeto do Intervention Image)
      $imagem = Image::make($request->file('imagem')); ;

      //Pega a extensão da imagem
      //$extImagem = $arq->extension();

      //Gera um nome randomico para a imagem e a extensão png
      $nomeImagem = rand( 100000, 999999999).'.png';

      //Salva na pasta Upload/imgs com a extensão definida acima
      $imagem->save('uploads/imgs/'.$nomeImagem, 80);
      //$request->photo->storeAs('uploads/imgs', $nomeImagem.'.jpg');

      //Salva a imagem (de tamanho médio) na pasta Upload/imgs/md
      $imagem->resize(420, 270)->save('uploads/imgs/md/'.$nomeImagem);

      //Salva a imagem (de tamanho pequeno) na pasta Upload/imgs/sm
      $imagem->crop(66, 66)->save('uploads/imgs/sm/'.$nomeImagem);

      //Monta o model para inserção no banco de dados
      $imagemModel = new Imagem();
      $imagemModel->legenda = $request->input('legenda');
      $imagemModel->imagemDestaque = $request->input('imagemDestaque');
      $imagemModel->caminhoArquivo = $nomeImagem;

      //insere no banco de dados
      $post->imagens()->save($imagemModel);

      //mensagem de sucesso
      Alert::success('Imagem '.$imagemModel->legeda.' inserida com sucesso!');

    } catch (\Exception $e){
      Alert::danger("Falha ao inserir a imagem: ".$e->getMessage());
    }

    //Retorna para a página de upload de imagens
    return redirect()->route('admin.upload.imagem', $post->id);
  }

  //Atualiza uma imagem no banco de dados
  public function atualizarImagem(ImagemRequest $request, $imagemId){
    try{
      $imagem = Imagem::find($imagemId);
      $imagem->update($request->all());

      Alert::success('Imagem atualizada com sucesso!');
    } catch (\Exception $e) {
      Alert::danger('Falha ao atualizar a imagem no banco de dados');
    }

    return redirect()->route('admin.post.imagens', $imagem->post->id);
  }

  //Remove uma imagem do BD
  public function removerImagem($id){
    try{
      $imagem = Imagem::find($id);

      //Remove a imagem do disco
      //Storage::delete(''$imagem->caminhoArquivo);

      //Remove do bd
      $imagem->delete();

      //mensagem de sucesso
      Alert::success("Imagem ".$imagem->legenda." removida com sucesso");

    } catch (\Exception $e){
      //mensagem de erro
      Alert::danger('Erro ao tentar remover a imagem '.$imagem->legenda);
    }

    //Exibe a lista de imagens do post novamente
    return redirect()->route('admin.post.imagens', $imagem->post->id);
  }
}
