<?php

namespace App\Repositories;

use App\Models\Boletos;
use App\Models\FinanceiroReceber;
use Illuminate\Support\Facades\App;

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

    public function save($boleto)
    {
        $model = new Boletos;

        return dd($boleto);

        // $model->empresa_id = 251;
        // $model->financeiro_receber_id = 1;
        // $model->seu_numero = $boleto->getSeuNumero();
        // $model->codigo_barras = $boleto->getCodigoBarras();
        // $model->linha_digitavel = $boleto->getLinhaDigitavel();
        // $model->boleto_arquivo = null;
        // $model->nosso_numero = $boleto->getNossoNumero();
        // $model->emissao = $boleto->getDataEmissao();
        // $model->vencimento = $boleto->getDataVencimento();
        // $model->pago = 0;

        // $model->save();
    }

    public function getBoleto($idBoleto)
    {
        $model = new Boletos;
        return $model->findOrFail($idBoleto);
    }


    public function updatePdfBoleto($idBoleto, $filename)
    {
        $model = Boletos::find($idBoleto);
        $model->boleto_arquivo = $filename;
        $saved = $model->save();

        if (!$saved) {
            App::abort(500, ['error', 500]);
        } else {
            return 'Arquivo PDF salvo com sucesso.';
        }
    }
}
