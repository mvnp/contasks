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
            'fantasia' =>               'required|min:6|max:255',
            'razao' =>                  'required|min:6|max:255',
            'cnpj' =>                   'required|digits:14|numeric|unique:empresas',
            'atividade' =>              'required|min:6',
            'rua' =>                    'required|min:6|max:255',
            'numero' =>                 'required|min:2|max:15',
            'complemento' =>           '',
            'bairro' =>                 'required|min:6|max:255',
            'cep' =>                    'required|digits:8',
            'cidade' =>                 'required|min:6|max:255',
            'estado' =>                 'required|min:2|max:255',
            'telefonePrincipal' =>      'required|min:10|max:11',
            'telefoneSecundario' =>     'required|min:10|max:11'
        ];
    }
}
