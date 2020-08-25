<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutorRequest extends FormRequest
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
            'nome'            => 'required',
            'data_nascimento' => 'required',
        ];
    }

    /**
     * Retorna mensagens padronizadas
     * @return array
     */
    public function messages()
    {
        return [
            'nome.required'                   => 'Nome não pode ser vazio.',
            'data_nascimento.required'        => 'Data de Nascimento não pode ser vazio.',
        ];
    }
}
