<?php

namespace App\Services;

use App\Repositories\BoletosRepository;
use Illuminate\Support\Facades\Validator;
use ctodobom\APInterPHP\StdSerializable;
use ctodobom\APInterPHP\BancoInter;
use ctodobom\APInterPHP\BancoInterException;
use ctodobom\APInterPHP\Cobranca\Boleto;
use ctodobom\APInterPHP\Cobranca\Desconto;
use ctodobom\APInterPHP\Cobranca\Mensagem;
use ctodobom\APInterPHP\Cobranca\Mora;
use ctodobom\APInterPHP\Cobranca\Multa;
use ctodobom\APInterPHP\Cobranca\Pagador;
use Exception;


class BoletosService
{
    //protected $boletosRepository;

    private $connectBanco;
    private $conta = "115830308";
    private $cnpj = "33240999000103";
    private $seuNumero = "0209463320";
    private $certificado = '/home/axibusiness.com.br/certs/certificado.crt'; //caminho/do/certificado.pem
    private $chavePrivada = '/home/axibusiness.com.br/certs/certificado.key'; //caminho/da/chaveprivada.key
    private $chavePrivadaSenha = ""; // $this->connectBanco->setKeyPassword("senhadachave");

    public function __construct()
    {
        $this->boletosRepository = new BoletosRepository;
        $this->connectBanco = new BancoInter($this->conta, $this->certificado, $this->chavePrivada);
    }

    public function gerarBoleto($idDebito) // <<<<<< ---- show($id)
    {
        $banco = new BancoInter($this->conta, $this->certificado, $this->chavePrivada);
        $boletosRepository = new BoletosRepository;
        $ArrayInfoDebito = $boletosRepository->getAll($idDebito);
        $boleto = $this->getBoleto($ArrayInfoDebito);

        try {




            # $this->connectBanco->createBoleto($boleto);

            $boleto = array(
                'message' => 'Boleto foi gerado com sucesso.',
                'data' => array(
                  'dataEmissao' => '2021-12-01',
                  'seuNumero' => '0209463320',
                  'dataLimite' => 'SESSENTA',
                  'dataVencimento' => '2021-12-11',
                  'valorNominal' => 336.85,
                  'valorAbatimento' => 0,
                  'cnpjCPFBeneficiario' => '33240999000103',
                  'numDiasAgenda' => 'SESSENTA',
                  'pagador' => array(
                    'cnpjCpf' => '10772017000110',
                    'nome' => 'AXITECH NEGOCIOS DIGITAIS',
                    'cep' => '88132212',
                    'bairro' => 'Pagani',
                    'endereco' => 'Rua Milão',
                    'numero' => '95',
                    'complemento' => 'Sala 601',
                    'cidade' => 'Palhoça',
                    'uf' => 'SC',
                    'tipoPessoa' => 'JURIDICA',
                    'email' => 'contato@axitech.com.br',
                    'ddd' => '48',
                    'telefone' => '991893313',
                  ),
                  'mensagem' => array (
                    'linha1' => 'Linha 1',
                    'linha2' => 'Linha 2',
                    'linha3' => 'Linha 3',
                    'linha4' => 'Linha 4',
                    'linha5' => 'Linha 5',
                  ),
                  'desconto1' => array (
                    'codigoDesconto' => 'NAOTEMDESCONTO',
                    'taxa' => 0,
                    'valor' => 0,
                    'data' => '',
                  ),
                  'desconto2' => array (
                    'codigoDesconto' => 'NAOTEMDESCONTO',
                    'taxa' => 0,
                    'valor' => 0,
                    'data' => '',
                  ),
                  'desconto3' => array (
                    'codigoDesconto' => 'NAOTEMDESCONTO',
                    'taxa' => 0,
                    'valor' => 0,
                    'data' => '',
                  ),
                  'multa' => array (
                    'codigoMulta' => 'NAOTEMMULTA',
                    'valor' => 0,
                    'taxa' => 0,
                    'data' => '',
                  ),
                  'mora' => array (
                    'codigoMora' => 'ISENTO',
                    'valor' => 0,
                    'taxa' => 0,
                    'data' => '',
                  ),
                  'nossoNumero' => '00755519776',
                  'codigoBarras' => '07793883100000336850001112043103300755519776',
                  'linhaDigitavel' => '07790001161204310330307555197768388310000033685',
                  'controller' => array (),
                ),
            );




            $this->registraBoleto($boleto);



            return $boleto;



        } catch (BancoInterException $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    public function registraBoleto($boleto)
    {
        $boletosRepository = new BoletosRepository;

        $dados = $boleto['data'];
        $boletoRegister = [
            'empresa_id ' => 251,
            'financeiro_id ' => 1,
            'seu_numero ' => $dados['seuNumero'],
            'codigo_barras ' => $dados['codigoBarras'],
            'linha_digitavel ' => $dados['linhaDigitavel'],
            'boleto_arquivo' => null,
            'nosso_numero ' => $dados['nossoNumero'],
            'emissao ' => $dados['dataEmissao'],
            'vencimento ' => $dados['dataVencimento'],
            'pago ' => 0
        ];

        $boletosRepository->save($boleto);
        // Acessar o repository
        // Montar o array das infos que vão na tabela
        // Inserir os dados na tabela
        // Pegar a resposta "true" e ir devolvendo até chegar no controller
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

    private function getPDFBoleto()
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
