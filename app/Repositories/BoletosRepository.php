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
        $model = new Boletos;

        $model->empresa_id = 251;
        $model->financeiro_id = 1;
        $model->seu_numero = $boleto->seu_numero;
        $model->codigo_barras = $boleto->codigo_barras;
        $model->linha_digitavel = $boleto->linha_digitavel;
        $model->boleto_arquivo = null;
        $model->nosso_numero = $boleto->nosso_numero;
        $model->emissao = $boleto->emissao;
        $model->vencimento = $boleto->vencimento;
        $model->pago = 0;

        $model->save();
    }
}
