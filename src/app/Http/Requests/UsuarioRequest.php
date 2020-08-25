<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
            'nome'         => 'required',
            'email'        => 'required',
            'password'     => 'required',
            'permissao'    => 'required',
        ];
    }

    /**
     * Retorna mensagens padronizadas
     * @return array
     */
    public function messages()
    {
        return [
            'nome.required'         => 'Nome não pode ser vazio.',
            'email.required'        => 'Email não pode ser vazio.',
            'password.required'     => 'Senha não pode ser vazio.',
            'permissao.required'    => 'Permissão não pode ser vazio.',
        ];
    }
}
