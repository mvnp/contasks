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
        //
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
        $debito = $boletosService->getPagador($id);

        return response()->json($debito, 200);
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
