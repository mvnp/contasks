<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FinanceiroPagar;
use App\Http\Requests\FinanceiroPagRequest;

class FinaceiroPagarController extends Controller
{
    private $financeiroPagar;

    public function __construct(FinanceiroPagar $financeiroPagar)
    {
        $this->financeiroPagar = $financeiroPagar;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $financeiroPagar = FinanceiroPagar::with('empresa_id', 'usuario_id', 'boleto_id')->get();
            return response()->json($financeiroPagar, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FinanceiroPagRequest $request)
    {
        $data = $request->all();

        try {
            $financeiroPagar = $this->financeiroPagar->create($data);
            return response()->json($financeiroPagar, 200);
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
        try {
            $financeiroPagar = $this->financeiroPagar->findOrFail($id);
            return response()->json(['data' => $financeiroPagar], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FinanceiroPagRequest $request, $id)
    {
        $data = $request->all();

        try {
            $financeiroPagar = $this->financeiroPagar->findOrFail($id);
            $financeiroPagar->update($data);
            return response()->json($financeiroPagar, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $financeiroPagar = $this->financeiroPagar->findOrFail($id);
            $financeiroPagar->delete();
            return response()->json($financeiroPagar, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }
}
