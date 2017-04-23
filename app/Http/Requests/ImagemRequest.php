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
            'legenda' => 'required|max:100',
            'imagemDestaque' => 'required'
        ];
    }

    public function messages(){
      return [
        'legenda.required' => 'Preencha corretamente o campo',
        'legenda.max' => 'O máximo de caracteres permito é 100',
        'imagemDestaque.required' => 'Defina se a imagem é destaque ou não'
      ];
    }
}