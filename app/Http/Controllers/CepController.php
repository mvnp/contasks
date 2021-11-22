<?php

namespace App\Http\Controllers;

class CepController extends Controller
{
    public function get($cep) {
        $cepResponse = \Canducci\Cep\Facades\Cep::find($cep);
        $data = $cepResponse->getCepModel();

        foreach ($this->estados() as $key) {
            if($data->uf == $key['sigla']) {
                $data->uf = $key['sigla'];
            }
        }

        return response()->json($data, 200);
    }

    public function estados() {
        return [
            [
                "nome" => "Acre",
                "sigla" => "AC"
            ],
            [
                "nome" =>  "Alagoas",
                "sigla" =>  "AL"
            ],
            [
                "nome" =>  "Amapá",
                "sigla" =>  "AP"
            ],
            [
                "nome" =>  "Amazonas",
                "sigla" =>  "AM"
            ],
            [
                "nome" =>  "Bahia",
                "sigla" =>  "BA"
            ],
            [
                "nome" =>  "Ceará",
                "sigla" =>  "CE"
            ],
            [
                "nome" =>  "Distrito Federal",
                "sigla" =>  "DF"
            ],
            [
                "nome" =>  "Espírito Santo",
                "sigla" =>  "ES"
            ],
            [
                "nome" =>  "Goiás",
                "sigla" =>  "GO"
            ],
            [
                "nome" =>  "Maranhão",
                "sigla" =>  "MA"
            ],
            [
                "nome" =>  "Mato Grosso",
                "sigla" =>  "MT"
            ],
            [
                "nome" =>  "Mato Grosso do Sul",
                "sigla" =>  "MS"
            ],
            [
                "nome" =>  "Minas Gerais",
                "sigla" =>  "MG"
            ],
            [
                "nome" =>  "Pará",
                "sigla" =>  "PA"
            ],
            [
                "nome" =>  "Paraíba",
                "sigla" =>  "PB"
            ],
            [
                "nome" =>  "Paraná",
                "sigla" =>  "PR"
            ],
            [
                "nome" =>  "Pernambuco",
                "sigla" =>  "PE"
            ],
            [
                "nome" =>  "Piauí",
                "sigla" =>  "PI"
            ],
            [
                "nome" =>  "Rio de Janeiro",
                "sigla" =>  "RJ"
            ],
            [
                "nome" =>  "Rio Grande do Norte",
                "sigla" =>  "RN"
            ],
            [
                "nome" =>  "Rio Grande do Sul",
                "sigla" =>  "RS"
            ],
            [
                "nome" =>  "Rondônia",
                "sigla" =>  "RO"
            ],
            [
                "nome" =>  "Roraima",
                "sigla" =>  "RR"
            ],
            [
                "nome" =>  "Santa Catarina",
                "sigla" =>  "SC"
            ],
            [
                "nome" =>  "São Paulo",
                "sigla" =>  "SP"
            ],
            [
                "nome" =>  "Sergipe",
                "sigla" =>  "SE"
            ],
            [
                "nome" =>  "Tocantins",
                "sigla" =>  "TO"
            ]
        ];
    }
}
