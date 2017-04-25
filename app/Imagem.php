<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
  protected $fillable = ['post_id', 'legenda', 'caminhoArquivo', 'imagemDestaque'];
  private $uploadedImagesPath ='/uploads/imgs/';
  const COLUNA_NOME = 'caminhoArquivo';

  public function post(){
    return $this->belongsTo(Post::class);
  }

  public function urlSm(){
    return url($this->uploadedImagesPath.'sm/'.$this->caminhoArquivo);
  }

  public function urlMd(){
    return url($this->uploadedImagesPath.'md/'.$this->caminhoArquivo);
  }

  public function url(){
    return url($this->uploadedImagesPath.$this->caminhoArquivo);
  }

  public function caminhoSm(){
    return public_path().$this->uploadedImagesPath.'sm/'.$this->caminhoArquivo;
  }

  public function caminhoMd(){
    return public_path().$this->uploadedImagesPath.'md/'.$this->caminhoArquivo;
  }

  public function caminho(){
    return public_path().$this->uploadedImagesPath.$this->caminhoArquivo;
  }

}
