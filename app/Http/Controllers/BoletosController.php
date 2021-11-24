<?php

namespace App\Http\Controllers;

use ctodobom\APInterPHP\BancoInter;
use ctodobom\APInterPHP\BancoInterException;
use ctodobom\APInterPHP\Cobranca\Boleto;
use ctodobom\APInterPHP\Cobranca\Pagador;

class Bolleto extends Controller
{
    private $financeiro;
    private $connectBanco;
    private $conta = "115830308";
    private $cnpj = "33240999000103";
    private $seuNumero = "0203916433240";
    private $certificado = "/caminho/do/certificado.crt"; //caminho/do/certificado.pem
    private $chavePrivada = "/caminho/da/chaveprivada.key"; //caminho/da/chaveprivada.key
    private $chavePrivadaSenha = ""; // $this->connectBanco->setKeyPassword("senhadachave");

    public function __construct(FinanceiroPagar $financeiro) {
    $this->financeiro = $financeiro;
    $this->connectBanco = new BancoInter($this->conta, $this->certificado, $this->chavePrivada);
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
    echo "\n seuNumero: ".$boleto->getSeuNumero();
    echo "\n nossoNumero: ".$boleto->getNossoNumero();
    echo "\n codigoBarras: ".$boleto->getCodigoBarras();
    echo "\n linhaDigitavel: ".$boleto->getLinhaDigitavel();
    } catch ( BancoInterException $e ) {
    echo "\n\n".$e->getMessage();
    echo "\n\nCabeçalhos: \n";
    echo $e->reply->header;
    echo "\n\nConteúdo: \n";
    echo $e->reply->body;
    }
    }

    private function getPagador()
    {
    $pagador = $this->financeiro;

    $pagador->setTipoPessoa("JURIDICA");
    $pagador->setNome($pagador->empresa->fantasia);
    $pagador->setEndereco($pagador->empresa->rua);
    $pagador->setNumero($pagador->empresa->numero);
    $pagador->setBairro($pagador->empresa->bairro);
    $pagador->setCidade($pagador->empresa->cidade);
    $pagador->setCep($pagador->empresa->cep);
    $pagador->setCnpjCpf($pagador->empresa->cnpj);
    $pagador->setUf($pagador->empresa->uf);

    return $pagador;
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
        echo "\n\nSalvo PDF em ".$pdf."\n";
    } catch ( BancoInterException $e ) {
        echo "\n\n".$e->getMessage();
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
        } catch ( BancoInterException $e ) {
            echo "\n\n".$e->getMessage();
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
        } catch ( BancoInterException $e ) {
        echo "\n\n".$e->getMessage();
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
    } catch ( BancoInterException $e ) {
    echo "\n\n".$e->getMessage();
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
        $listaBoletos = $this->connectBanco->listaBoletos(date('Y-m-d'), date_add(new DateTime() , new DateInterval("P10D"))->format('Y-m-d'));
        var_dump($listaBoletos);
        } catch ( BancoInterException $e ) {
        echo "\n\n".$e->getMessage();
        echo "\n\nCabeçalhos: \n";
        echo $e->reply->header;
        echo "\n\nConteúdo: \n";
        echo $e->reply->body;
        }
    }
}
