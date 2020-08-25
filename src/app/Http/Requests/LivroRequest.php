<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroRequest extends FormRequest
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
            'ano'    => 'required',
            'edicao' => 'required',
            'isbn'   => 'required',
            'preco'  => 'required',
            'titulo' => 'required',
        ];
    }

    /**
     * Retorna mensagens padronizadas
     * @return array
     */
    public function messages()
    {
        return [
            'ano.required'       => 'Ano não pode ser vazio.',
            'edicao.required'    => 'Edição de Nascimento não pode ser vazio.',
            'isbn.required'      => 'ISBN não pode ser vazio.',
            'preco.required'     => 'Preço não pode ser vazio.',
            'titulo.required'    => 'Título do livro não pode ser vazio.',
        ];
    }
}
