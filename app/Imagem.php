<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    protected $fillable = ['post_id', 'legenda', 'caminhoArquivo', 'imagemDestaque'];
    private $uploadedImagesPath ='/uploads/imgs/';

    public function post(){
    	return $this->belongsTo(Post::class);
    }

    public function urlThumb(){
      return url($this->uploadedImagesPath.'sm/'.$this->caminhoArquivo);
    }

    public function urlMd(){
      return url($this->uploadedImagesPath.'md/'.$this->caminhoArquivo);
    }

    public function url(){
      return url($this->uploadedImagesPath.$this->caminhoArquivo);
    }
}
