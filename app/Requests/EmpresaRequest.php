<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
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
            'fantasia' => 'required',
            'razao' => 'required',
            'cnpj' => 'required',
            'rua' => 'required',
            'numero' => 'required',
            'completmento' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'telefonePrincipal' => 'required',
            'telefoneSecundario' => 'required',

        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'fantasia.required' => 'Please fill the fantasia.',
            'razao.required' => 'Please fill the razao.',
            'cnpj.required' => 'Please fill the cnpj.',
            'rua.required' => 'Please fill the rua.',
            'numero.required' => 'Please fill the numero.',
            'completmento.required' => 'Please fill the completmento.',
            'bairro.required' => 'Please fill the bairro.',
            'cidade.required' => 'Please fill the cidade.',
            'estado.required' => 'Please fill the estado.',
            'telefonePrincipal.required' => 'Please fill the telefonePrincipal.',
            'telefoneSecundario.required' => 'Please fill the telefoneSecundario.'

        ];
    }
}
