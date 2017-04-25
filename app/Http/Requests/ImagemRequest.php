<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImagemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'imagem' => 'required|image',
            'legenda' => 'required|max:100',
            'imagemDestaque' => 'required'
        ];
    }

    public function messages(){
      return [
        'imagem.required' => 'Por favor, selecione uma imagem',
        'imagem.image' => 'Por favor, selecione uma imagem nos formatos jpeg, png, ou gif',
        'legenda.required' => 'Preencha corretamente o campo',
        'legenda.max' => 'O máximo de caracteres permito é 100',
        'imagemDestaque.required' => 'Defina se a imagem é destaque ou não'
      ];
    }
}
