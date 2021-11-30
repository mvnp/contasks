<?php

namespace App\Services;

use App\Repositories\BoletosRepository;
use ctodobom\APInterPHP\BancoInter;
use ctodobom\APInterPHP\Cobranca\Pagador;
use ctodobom\APInterPHP\Cobranca\Boleto;
use ctodobom\APInterPHP\StdSerializable;
use ctodobom\APInterPHP\BancoInterException;
use Illuminate\Support\Facades\Validator;
use Exception;


class BoletosService
{
    //protected $boletosRepository;

    private $connectBanco;
    private $conta = "115830308";
    private $cnpj = "33240999000103";
    private $seuNumero = "0203916433240";
    private $certificado = "/caminho/do/certificado.crt"; //caminho/do/certificado.pem
    private $chavePrivada = "/caminho/da/chaveprivada.key"; //caminho/da/chaveprivada.key
    private $chavePrivadaSenha = ""; // $this->connectBanco->setKeyPassword("senhadachave");

    public function __construct()
    {
        $this->boletosRepository = new BoletosRepository;

        //$this->connectBanco = new BancoInter($this->conta, $this->certificado, $this->chavePrivada);
    }

    public function getPagador()
    {
        $financeiro = new BoletosRepository;
        $debito = $financeiro->getAll(1);

        //$pagador = new Pagador;

        //$pagador->setTipoPessoa("JURIDICA");
        //$pagador->setNome($debito->empresa->fantasia);
        //$pagador->setEndereco($debito->empresa->rua);
        //$pagador->setNumero($debito->empresa->numero);
        //$pagador->setComplemento($debito->empresa->complemento);
        //$pagador->setBairro($debito->empresa->bairro);
        //$pagador->setCidade($debito->empresa->cidade);
        //$pagador->setCep($debito->empresa->cep);
        //$pagador->setCnpjCpf($debito->empresa->cnpj);
        //$pagador->setUf($debito->empresa->estado);
        //$pagador->setDdd($debito->empresa->ddd);
        //$pagador->setEmail($debito->empresa->email);

        return $debito;
    }

    public function gerarBoleto()
    {
        $boleto = new Boleto();
        $pagador = $this->getPagador();

        $boleto->setCnpjCPFBeneficiario($this->cnpj);
        $boleto->setPagador($pagador);
        $boleto->setSeuNumero($this->seuNumero);
        $boleto->setDataEmissao(date('Y-m-d'));
        $boleto->setValorNominal(100.10);
        $boleto->setDataVencimento(date_add(new DateTime(), new DateInterval("P10D"))->format('Y-m-d'));

        try {
            $this->connectBanco->createBoleto($boleto);
            echo "\nBoleto Criado\n";
            echo "\n seuNumero: " . $boleto->getSeuNumero();
            echo "\n nossoNumero: " . $boleto->getNossoNumero();
            echo "\n codigoBarras: " . $boleto->getCodigoBarras();
            echo "\n linhaDigitavel: " . $boleto->getLinhaDigitavel();
        } catch (BancoInterException $e) {
            echo "\n\n" . $e->getMessage();
            echo "\n\nCabeçalhos: \n";
            echo $e->reply->header;
            echo "\n\nConteúdo: \n";
            echo $e->reply->body;
        }
    }



    private function getPDFBoleto()
    {
        $boleto = new Boleto();
        $pagador = $this->getPagador();

        $boleto->setCnpjCPFBeneficiario($this->cnpj);
        $boleto->setPagador($pagador);
        $boleto->setSeuNumero($this->seuNumero);
        $boleto->setDataEmissao(date('Y-m-d'));
        $boleto->setValorNominal(100.10);
        $boleto->setDataVencimento(date_add(new DateTime(), new DateInterval("P10D"))->format('Y-m-d'));

        try {
            echo "\Download do PDF\n";
            $pdf = $this->connectBanco->getPdfBoleto($boleto->getNossoNumero());
            echo "\n\nSalvo PDF em " . $pdf . "\n";
        } catch (BancoInterException $e) {
            echo "\n\n" . $e->getMessage();
            echo "\n\nCabeçalhos: \n";
            echo $e->reply->header;
            echo "\n\nConteúdo: \n";
            echo $e->reply->body;
        }
    }

    private function consultarBoleto()
    {
        $boleto = new Boleto();
        $pagador = $this->getPagador();

        $boleto->setCnpjCPFBeneficiario($this->cnpj);
        $boleto->setPagador($pagador);
        $boleto->setSeuNumero($this->seuNumero);
        $boleto->setDataEmissao(date('Y-m-d'));
        $boleto->setValorNominal(100.10);
        $boleto->setDataVencimento(date_add(new DateTime(), new DateInterval("P10D"))->format('Y-m-d'));

        try {
            echo "\nConsultando boleto\n";
            $boleto2 = $this->connectBanco->getBoleto($boleto->getNossoNumero());
            var_dump($boleto2);
        } catch (BancoInterException $e) {
            echo "\n\n" . $e->getMessage();
            echo "\n\nCabeçalhos: \n";
            echo $e->reply->header;
            echo "\n\nConteúdo: \n";
            echo $e->reply->body;
        }
    }

    private function baixarBoleto()
    {
        $boleto = new Boleto();
        $pagador = $this->getPagador();

        $boleto->setCnpjCPFBeneficiario($this->cnpj);
        $boleto->setPagador($pagador);
        $boleto->setSeuNumero($this->seuNumero);
        $boleto->setDataEmissao(date('Y-m-d'));
        $boleto->setValorNominal(100.10);
        $boleto->setDataVencimento(date_add(new DateTime(), new DateInterval("P10D"))->format('Y-m-d'));

        try {
            echo "\nBaixando boleto\n";
            $this->connectBanco->baixaBoleto($boleto->getNossoNumero(), INTER_BAIXA_DEVOLUCAO);
            echo "Boleto Baixado";
        } catch (BancoInterException $e) {
            echo "\n\n" . $e->getMessage();
            echo "\n\nCabeçalhos: \n";
            echo $e->reply->header;
            echo "\n\nConteúdo: \n";
            echo $e->reply->body;
        }
    }

    private function consultarBoletoAntigo()
    {
        try {
            echo "\nConsultando boleto antigo\n";
            $boleto2 = $this->connectBanco->getBoleto("00571817313");
            var_dump($boleto2);
        } catch (BancoInterException $e) {
            echo "\n\n" . $e->getMessage();
            echo "\n\nCabeçalhos: \n";
            echo $e->reply->header;
            echo "\n\nConteúdo: \n";
            echo $e->reply->body;
        }
    }

    private function listarBoletos()
    {
        try {
            echo "\nListando boletos vencendo nos próximos 10 dias (apenas a primeira página)\n";
            $listaBoletos = $this->connectBanco->listaBoletos(date('Y-m-d'), date_add(new DateTime(), new DateInterval("P10D"))->format('Y-m-d'));
            var_dump($listaBoletos);
        } catch (BancoInterException $e) {
            echo "\n\n" . $e->getMessage();
            echo "\n\nCabeçalhos: \n";
            echo $e->reply->header;
            echo "\n\nConteúdo: \n";
            echo $e->reply->body;
        }
    }
}
