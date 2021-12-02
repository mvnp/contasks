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

        return response()->json([
            "message" => "Boleto foi gerado com sucesso.",
            'data' => $geradorBoleto
        ], 200);

        // if ($debito === true) {
        //     return response()->json([
        //         "message" => "Boleto foi gerado com sucesso."
        //     ], 200);
        // }

        // return response()->json([
        //     "message" => "Boleto não foi gerado."
        // ], 422);
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
