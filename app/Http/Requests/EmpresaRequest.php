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
            'razao' => 'required|min:6|max:255',
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

    public function messages()
    {
        return [
            'fantasia' => [
                'required' => 'O campo :attribute é obrigatorio!.',
                'min' => 'O campo :attribute deve ter o mínimo de 6 caracteres.',
                'max' => 'O campo :attribute deve ter o mínimo de 255 caracteres.'
            ],

            // 'razao' => [
            //     'required' => 'O campo razao é obrigatorio!.',
            //     'min' => 'O campo razao deve ter o mínimo de 6 caracteres.',
            //     'max' => 'O campo razao deve ter o mínimo de 255 caracteres.'
            // ],

            // 'cnpj' => [
            //     'required' => 'O campo cnpj é obrigatorio!.',
            //     'min' => 'O campo cnpj deve ter o mínimo de 14 caracteres.',
            //     'max' => 'O campo cnpj deve ter o mínimo de 14 caracteres.',
            //     'numeric' => 'O campo cnpj deve ter apenas numeros.'
            // ],

            // 'atividade' => [
            //     'required' => 'O campo atividade é obrigatorio!.',
            //     'min' => 'O campo atividade deve ter o mínimo de 6 caracteres.',
            //     'max' => 'O campo atividade deve ter o mínimo de 255 caracteres.'
            // ],

            // 'rua' => [
            //     'required' => 'O campo rua é obrigatorio!.',
            //     'min' => 'O campo rua deve ter o mínimo de 6 caracteres.',
            //     'max' => 'O campo rua deve ter o mínimo de 255 caracteres.'
            // ],

            // 'numero' => [
            //     'required' => 'O campo numero é obrigatorio!.',
            //     'min' => 'O campo numero deve ter o mínimo de 2 caracteres.',
            //     'max' => 'O campo numero deve ter o mínimo de 15 caracteres.'
            // ],

            // 'completmento' => [
            //     'required' => 'O campo completmento é obrigatorio!.',
            //     'min' => 'O campo completmento deve ter o mínimo de 6 caracteres.',
            //     'max' => 'O campo completmento deve ter o mínimo de 255 caracteres.'
            // ],

            // 'bairro' => [
            //     'required' => 'O campo bairro é obrigatorio!.',
            //     'min' => 'O campo bairro deve ter o mínimo de 6 caracteres.',
            //     'max' => 'O campo bairro deve ter o mínimo de 255 caracteres.'
            // ],

            // 'cep' => [
            //     'required' => 'O campo cep é obrigatorio!.',
            //     'min' => 'O campo cep deve ter o mínimo de 8 caracteres.',
            //     'max' => 'O campo cep deve ter o mínimo de 8 caracteres.',
            //     'numeric' => 'O campo cep deve ter apenas numeros.'
            // ],

            // 'cidade' => [
            //     'required' => 'O campo cidade é obrigatorio!.',
            //     'min' => 'O campo cidade deve ter o mínimo de 6 caracteres.',
            //     'max' => 'O campo cidade deve ter o mínimo de 255 caracteres.',
            // ],

            // 'estado' => [
            //     'required' => 'O campo estado é obrigatorio!.',
            //     'min' => 'O campo estado deve ter o mínimo de 6 caracteres.',
            //     'max' => 'O campo estado deve ter o mínimo de 255 caracteres.',
            // ],

            // 'telefonePrincipal' => [
            //     'required' => 'O campo telefonePrincipal é obrigatorio!.',
            //     'min' => 'O campo telefonePrincipal deve ter o mínimo de 8 caracteres.',
            //     'max' => 'O campo telefonePrincipal deve ter o mínimo de 8 caracteres.',
            //     'numeric' => 'O campo telefonePrincipal deve ter apenas numeros.'
            // ],

            // 'telefoneSecundario' => [
            //     'required' => 'O campo telefoneSecundario é obrigatorio!.',
            //     'min' => 'O campo telefoneSecundario deve ter o mínimo de 8 caracteres.',
            //     'max' => 'O campo telefoneSecundario deve ter o mínimo de 8 caracteres.',
            //     'numeric' => 'O campo telefoneSecundario deve ter apenas numeros.'
            // ],
        ];
    }
}
