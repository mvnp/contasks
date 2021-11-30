<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FinanceiroReceber;
use App\Http\Requests\FinanceiroRecRequest;

class FinaceiroReceberController extends Controller
{
    private $financeiroReceber;

    public function __construct(FinanceiroReceber $financeiroReceber)
    {
        $this->financeiroReceber = $financeiroReceber;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $financeiroReceber = FinanceiroReceber::with('empresa_id', 'usuario_id', 'boleto_id')->get();
            return response()->json($financeiroReceber, 200);
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
    public function store(FinanceiroRecRequest $request)
    {
        $data = $request->all();

        try {
            $financeiroReceber = $this->financeiroReceber->create($data);
            return response()->json($financeiroReceber, 200);
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
            $financeiroReceber = FinanceiroReceber::with('empresas')->findOrFail($id);
            //$financeiroReceber = $this->financeiroReceber->findOrFail($id);
            return response()->json(['data' => $financeiroReceber], 200);
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
    public function update(FinanceiroRecRequest $request, $id)
    {
        $data = $request->all();

        try {
            $financeiroReceber = $this->financeiroReceber->findOrFail($id);
            $financeiroReceber->update($data);
            return response()->json($financeiroReceber, 200);
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

            $financeiroReceber = $this->financeiroReceber->findOrFail($id);
            $financeiroReceber->delete();
            return response()->json($financeiroReceber, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }
}
