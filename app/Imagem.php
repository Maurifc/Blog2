<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    protected $fillable = ['post_id', 'legenda', 'caminhoArquivo', 'imagemDestaque'];

    public function post(){
    	return $this->belongsTo(Post::class);
    }
}
