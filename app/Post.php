<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['titulo', 'texto', 'bloqueado', 'dataFantasia'];


    public function usuario(){
    	return $this->belongsTo(Usuario::class);
    }

    public function categoria(){
    	return $this->belongsTo(Categoria::class);
    }

    public function imagens(){
    	return $this->hasMany(Imagem::class);
    }

    public function imagemDestaque(){
        return $this->imagens()->where('imagemDestaque', 1)->take(1);
    }
}
