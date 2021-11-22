<?php

namespace App\Http\Controllers;

class CepController extends Controller
{
    public function get($cep) {
        $cepResponse = \Canducci\Cep\Facades\Cep::find($cep);
        $data = $cepResponse->getCepModel();
        return response()->json($data, 200);
    }
}
