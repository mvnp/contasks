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
            // 'cnae' =>                   '',
            // 'inscricaoMunicipal' =>     '',
            // 'inscricaoEstadual' =>      '',
            // 'complemento' =>            '',
            'cnpj' =>                   'required|digits:14|numeric|unique:empresas|cnpj',
            'email' =>                  'required|email',
            'atividade' =>              'required|min:6',
            'rua' =>                    'required|min:4|max:255',
            'numero' =>                 'required|min:2|max:15',
            'bairro' =>                 'required|min:4|max:255',
            'cep' =>                    'required|digits:8',
            'cidade' =>                 'required|min:4|max:255',
            'estado' =>                 'required|min:2|max:255',
            'ddd' =>                    'required|digits:2',
            'telefonePrincipal' =>      'required|min:9|max:10',
            'telefoneSecundario' =>     'required|min:9|max:10'
        ];
    }
}
