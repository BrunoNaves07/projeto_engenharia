<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'nome'       => 'required',
            'cpf'        => 'required',
            'logradouro' => 'required',
            'numero'     => 'required',
            'bairro'     => 'required',
            'cep'        => 'required',
            'cidade'     => 'required',
            'estado'     => 'required',
            'telefone'   => 'required',
            'email'      => 'required',
        ];
    }

    /**
     * Retorna mensagens padronizadas
     * @return array
     */
    public function messages()
    {
        return [
            'nome.required'       => 'Nome não pode ser vazio.',
            'cpf.required'        => 'CPF não pode ser vazio.',
            'logradouro.required' => 'Logradouro não pode ser vazio.',
            'numero.required'     => 'Número não pode ser vazio.',
            'bairro.required'     => 'Bairro não pode ser vazio.',
            'cep.required'        => 'CEP não pode ser vazio.',
            'cidade.required'     => 'Cidade não pode ser vazio.',
            'estado.required'     => 'Estado não pode ser vazio.',
            'telefone.required'   => 'Telefone não pode ser vazio.',
            'email.required'      => 'Email não pode ser vazio.',
        ];
    }
}
