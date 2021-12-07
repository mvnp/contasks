<?php

namespace App\Services;

use App\Repositories\BoletosRepository;
use ctodobom\APInterPHP\BancoInter;
use ctodobom\APInterPHP\BancoInterException;
use ctodobom\APInterPHP\Cobranca\Boleto;
use ctodobom\APInterPHP\Cobranca\Desconto;
use ctodobom\APInterPHP\Cobranca\Mensagem;
use ctodobom\APInterPHP\Cobranca\Mora;
use ctodobom\APInterPHP\Cobranca\Multa;
use ctodobom\APInterPHP\Cobranca\Pagador;

class BoletosService
{
    private $connectBanco;
    private $conta = "115830308";
    private $cnpj = "33240999000103";
    private $seuNumero = "0209463320";
    private $certificado = '/home/axibusiness.com.br/certs/certificado.crt'; //caminho/do/certificado.pem
    private $chavePrivada = '/home/axibusiness.com.br/certs/certificado.key'; //caminho/da/chaveprivada.key
    // private $certificado = 'C:\Server\www\_contasks\bakend_contasks\certs\certificado.crt'; //caminho/do/certificado.pem
    // private $chavePrivada = 'C:\Server\www\_contasks\bakend_contasks\certs\certificado.key'; //caminho/da/chaveprivada.key
    // private $chavePrivadaSenha = ""; // $this->connectBanco->setKeyPassword("senhadachave");

    public function __construct()
    {
        $this->boletosRepository = new BoletosRepository;
        $this->connectBanco = new BancoInter($this->conta, $this->certificado, $this->chavePrivada);
    }

    public function gerarBoleto($idDebito)
    {
        $boletosRepository = new BoletosRepository;
        $ArrayInfoDebito = $boletosRepository->getAll($idDebito);
        $boleto = $this->getBoleto($ArrayInfoDebito);

        try {
            // MOCK
            $this->connectBanco->createBoleto($boleto);
            // return dd($boleto);
            // $boleto = array( // $mock
            //     "dataEmissao" => "2021-12-06",
            //     "seuNumero" => "0209463320",
            //     "dataLimite" => "SESSENTA",
            //     "dataVencimento" => "2021-12-16",
            //     "valorNominal" => 36.85,
            //     "valorAbatimento" => 0.0,
            //     "cnpjCPFBeneficiario" => "33240999000103",
            //     "numDiasAgenda" => "SESSENTA",
            //     "pagador" => array(
            //         "cnpjCpf" => "10772017000110",
            //         "nome" => "AXITECH NEGOCIOS DIGITAIS",
            //         "cep" => "88132212",
            //         "bairro" => "Pagani",
            //         "endereco" => "Rua Milão",
            //         "numero" => "95",
            //         "complemento" => "Sala 601",
            //         "cidade" => "Palhoça",
            //         "uf" => "SC",
            //         "tipoPessoa" => "JURIDICA",
            //         "email" => "contato@axitech.com.br",
            //         "ddd" => "48",
            //         "telefone" => "991893313",
            //     ),
            //     "mensagem" => array(
            //         "linha1" => "Linha 1",
            //         "linha2" => "Linha 2",
            //         "linha3" => "Linha 3",
            //         "linha4" => "Linha 4",
            //         "linha5" => "Linha 5",
            //     ),
            //     "desconto1" => array(
            //         "codigoDesconto" => "NAOTEMDESCONTO",
            //         "taxa" => 0,
            //         "valor" => 0,
            //         "data" => "",
            //     ),
            //     "desconto2" => array(
            //         "codigoDesconto" => "NAOTEMDESCONTO",
            //         "taxa" => 0,
            //         "valor" => 0,
            //         "data" => "",
            //     ),
            //     "desconto3" => array(
            //         "codigoDesconto" => "NAOTEMDESCONTO",
            //         "taxa" => 0,
            //         "valor" => 0,
            //         "data" => "",
            //     ),
            //     "multa" => array(
            //         "codigoMulta" => "NAOTEMMULTA",
            //         "valor" => 0,
            //         "taxa" => 0,
            //         "data" => "",
            //     ),
            //     "mora" => array(
            //         "codigoMora" => "ISENTO",
            //         "valor" => 0,
            //         "taxa" => 0,
            //         "data" => "",
            //     ),
            //     "nossoNumero" => "00758378238",
            //     "codigoBarras" => "07798883600000036850001112043103300758378238",
            //     "linhaDigitavel" => "07790001161204310330307583782383888360000003685",
            //     "controller" => array(
            //         "apiBaseURL" => "https://apis.bancointer.com.br",
            //         "accountNumber" => "115830308",
            //         "certificateFile" => "/home/axibusiness.com.br/certs/certificado.crt",
            //         "keyFile" => "/home/axibusiness.com.br/certs/certificado.key",
            //         "keyPassword" => null,
            //         "curl" => null
            //     )
            // );
            return $this->registraBoleto($boleto);
        } catch (BancoInterException $e) {
            return $e->getMessage();
        }
    }

    // if (FinanceiroReceber::with('boleto')->find($idDebito)->boleto) {
    //     return true;
    // }


    public function registraBoleto($boleto)
    {
        $boletosRepository = new BoletosRepository;
        return $boletosRepository->save($boleto);
    }

    public function getPagador($ArrayInfoDebito)
    {
        $dados = $ArrayInfoDebito;

        $pagador = new Pagador;

        $pagador->setTipoPessoa("JURIDICA");
        $pagador->setNome($dados->empresas->fantasia);
        $pagador->setEndereco($dados->empresas->rua);
        $pagador->setNumero($dados->empresas->numero);
        $pagador->setComplemento($dados->empresas->complemento);
        $pagador->setBairro($dados->empresas->bairro);
        $pagador->setCidade($dados->empresas->cidade);
        $pagador->setCep($dados->empresas->cep);
        $pagador->setCnpjCpf($dados->empresas->cnpj);
        $pagador->setUf($dados->empresas->estado);
        $pagador->setDdd($dados->empresas->ddd);
        $pagador->setTelefone($dados->empresas->telefonePrincipal);
        $pagador->setEmail($dados->empresas->email);

        return $pagador;
    }

    public function getBoleto($infoDebito)
    {
        $boleto = new Boleto();

        $boleto->setCnpjCPFBeneficiario($this->cnpj);
        $boleto->setPagador($this->getPagador($infoDebito));
        $boleto->setSeuNumero($this->seuNumero);
        $boleto->setDataEmissao(date('Y-m-d'));
        $boleto->setValorNominal($infoDebito['valor']);
        $boleto->setMensagem($this->getMensagens());
        $boleto->setMulta($this->getMulta());
        $boleto->setDesconto1($this->getDesconto1());
        $boleto->setDesconto2($this->getDesconto2());
        $boleto->setDesconto3($this->getDesconto3());
        $boleto->setDataVencimento(date_add(new \DateTime(), new \DateInterval("P10D"))->format('Y-m-d'));

        return $boleto;
    }

    public function getMensagens()
    {
        $mensagem = new Mensagem;

        $mensagem->setLinha1("Linha 1");
        $mensagem->setLinha2("Linha 2");
        $mensagem->setLinha3("Linha 3");
        $mensagem->setLinha4("Linha 4");
        $mensagem->setLinha5("Linha 5");

        return $mensagem;
    }

    public function getMulta()
    {
        $multa = new Multa;

        $multa->setCodigoMulta("NAOTEMMULTA");
        $multa->setValor(0);
        $multa->setTaxa(0);

        return $multa;
    }

    public function getMora()
    {
        $multa = new Mora;

        $multa->setCodigoMora("ISENTO");
        $multa->setValor(0);
        $multa->setTaxa(0);

        return $multa;
    }

    public function getDesconto1()
    {
        $desconto = new Desconto;

        $desconto->setCodigoDesconto("NAOTEMDESCONTO");
        $desconto->setValor(0);
        $desconto->setTaxa(0);

        return $desconto;
    }

    public function getDesconto2()
    {
        $desconto = new Desconto;

        $desconto->setCodigoDesconto("NAOTEMDESCONTO");
        $desconto->setValor(0);
        $desconto->setTaxa(0);

        return $desconto;
    }

    public function getDesconto3()
    {
        $desconto = new Desconto;

        $desconto->setCodigoDesconto("NAOTEMDESCONTO");
        $desconto->setValor(0);
        $desconto->setTaxa(0);

        return $desconto;
    }

    public function getPDFBoleto($idBoleto)
    {
        $boletosRepository = new BoletosRepository;
        $infoBoleto = $boletosRepository->getBoleto($idBoleto);
        $nossoNumero = $infoBoleto['nosso_numero'];

        try {
            $pdf = $this->connectBanco->getPdfBoleto($nossoNumero, '/home/axibusiness.com.br/public/boletos/');

            $filename = explode("/", $pdf);
            $filename = end($filename);
            return $boletosRepository->updatePdfBoleto($idBoleto, $filename);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // private function registraPdfBoleto($nossoNumero)
    // {
    //     $boletosRepository = new BoletosRepository;
    //     $infoBoleto = $boletosRepository->getBoleto($idBoleto);

    //     $nossoNumero = $infoBoleto['nosso_numero'];

    //     vardump

    //     $pdf = $this->connectBanco->getPdfBoleto($nossoNumero, '/home/axibusiness.com.br/public/boletos/');

    //     return $boletosRepository->savePdf($pdfboleto);
    // }

    private function consultarBoleto()
    {
        $boleto = new Boleto();

        $pagador = $this->getPagador();

        $boleto->setCnpjCPFBeneficiario($this->cnpj);
        $boleto->setPagador($pagador);
        $boleto->setSeuNumero($this->seuNumero);
        $boleto->setDataEmissao(date('Y-m-d'));
        $boleto->setValorNominal(100.10);
        $boleto->setDataVencimento(date_add(new \DateTime(), new \DateInterval("P10D")));

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
        $boleto->setDataVencimento(date_add(new \DateTime(), new \DateInterval("P10D")));

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
            $listaBoletos = $this->connectBanco->listaBoletos(date('Y-m-d'), date_add(new \DateTime(), new \DateInterval("P10D")));
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
