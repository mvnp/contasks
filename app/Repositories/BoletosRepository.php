<?php

namespace App\Repositories;

use App\Models\Boletos;
use App\Models\FinanceiroReceber;
use App\Models\Empresas;
use GuzzleHttp\Psr7\Request;

class BoletosRepository
{

    protected $financeiroReceber;

    public function __construct()
    {
        $this->financeiroReceber = new FinanceiroReceber;
    }

    //
    /**
     * Get all posts.
     *
     * @return Post $post
     */
    public function getAll($idDebito)
    {
        return $this->financeiroReceber::with('empresas')->find($idDebito);
        //$financeiroReceber = FinanceiroReceber::with('empresas')->findOrFail($id);
    }

    public function getBanco($conta)
    {
        //
    }

    public function save($boleto)
    {
<<<<<<< HEAD
        // $boleto = array(
        //     'empresa_id' => $boleto->seuNumero()
        //     'seunumero' => $boleto->seuNumero()
        //     'seunumero' => $boleto->seuNumero()
        //     'seunumero' => $boleto->seuNumero()
        //     'seunumero' => $boleto->seuNumero()
        //     'seunumero' => $boleto->seuNumero()
        //     'seunumero' => $boleto->seuNumero()
        //     'seunumero' => $boleto->seuNumero()
        // );

        // Model // save ou create
        // if (Boletos::save($boleto)) {
        //     return true;
        // }
=======
        $model = new Boletos;

        $model->empresa_id = 251;
        $model->financeiro_id = 1;
        $model->seu_numero = $boleto['seuNumero'];
        $model->codigo_barras = $boleto['codigoBarras'];
        $model->linha_digitavel = $boleto['linhaDigitavel'];
        $model->boleto_arquivo = null;
        $model->nosso_numero = $boleto['nossoNumero'];
        $model->emissao = $boleto['dataEmissao'];
        $model->vencimento = $boleto['dataVencimento'];
        $model->pago = 0;

        $model->save();
>>>>>>> e697de6c5779b2ee80679821de979cc0435cd022
    }
}
