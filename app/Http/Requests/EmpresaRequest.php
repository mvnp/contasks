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
            'fantasia' => 'required|min:6|max:255',
            'razao' => 'required|min:6|max:100',
            'cnpj' => 'required|min:14|max:14|numeric',
            'atividade' => 'required|min:6|max:255',
            'rua' => 'required|min:6|max:255',
            'numero' => 'required|min:2|max:15',
            'completmento' => 'required|min:6|max:255',
            'bairro' => 'required|min:6|max:255',
            'cep' => 'required|min:8|max:8|numeric',
            'cidade' => 'required|min:6|max:255',
            'estado' => 'required|min:6|max:255',
            'telefonePrincipal' => 'required|min:9|max:11|numeric',
            'telefoneSecundario' => 'required|min:9|max:11|numeric'
        ];
    }
}
