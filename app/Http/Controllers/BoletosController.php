<?php

namespace App\Http\Controllers;

use App\Services\BoletosService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BoletosController extends Controller
{
    protected $boletosService;

    public function __construct(BoletosService $boletosService)
    {
        $this->boletosService = $boletosService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $boletos = $this->boletosService->getAllData();

        // return response()->json([
        //     'data' => $boletos
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $boleto = $this->boletosService->gerarBoleto($request);

        try {
            $boleto = $this->boletosService->gerarBoleto($request);
            return response()->json($boleto, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $boletosService = new BoletosService;
        $geradorBoleto = $boletosService->gerarBoleto($id);

        // try {
        //     match ($geradorBoleto) {
        //         true => response()->json(['data+' => 'Boleto já existe.']),
        //         $geradorBoleto->$id => response()->json(['data' => 'Boleto foi criado com sucesso.']),
        //     };
        // } catch (\UnhandledMatchError $e) {
        //     return response()->json(['error' => "Boleto não foi gerado."], 401);
        // }

        //var_dump($geradorBoleto);

        $result = match ($geradorBoleto) {
            $geradorBoleto >= true => response()->json(['error' => 'Boleto já existe.']),
            $geradorBoleto >= $id => response()->json(['data' => 'Boleto foi criado com sucesso.']),
            default => throw new \Exception('Não foi possível criar boleto'),
        };

        return $result;

        // try {
        //     $geradorBoleto = $boletosService->gerarBoleto($id);
        //     return response()->json([
        //         "message" => "Boleto foi gerado com sucesso.",
        //         'data' => $geradorBoleto
        //     ], 200);
        // } catch (\Exception $e) {
        //     return response()->json(['error' => "Boleto não foi gerado."], 401);
        // }
    }

    public function savePdf($id)
    {
        $boletosService = new BoletosService;
        $pdfBoleto = $boletosService->getPDFBoleto($id);

        return response()->json([
            'data' => $pdfBoleto
        ], 200);

        // return response()->json([
        //     "message" => $debito
        // ], 200);
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
