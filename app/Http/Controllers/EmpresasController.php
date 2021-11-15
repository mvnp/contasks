<?php

namespace App\Http\Controllers;

use App\Models\Empresas;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\EmpresaRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmpresaResource;
use App\Api\ApiMessages;



class EmpresasController extends Controller
{
    private $empresas;

    public function __construct(Empresas $empresas)
    {
        $this->empresas = $empresas;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $empresas = $this->empresas->get();
        return response()->json($empresas, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        try {
            $empresa = $this->empresas->create($data);
            return response()->json($empresa, 200);
        }
        catch (\Exception $e) {
            return response()->json($e->getMessage(), 401);
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
            $empresa = $this->empresas->findOrFail($id);
            return response()->json(['data' => $empresa], 200);
        }
        catch (\Exception $e) {
            return response()->json($e->getMessage(), 401);
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        try {
            $empresa = $this->empresas->findOrFail($id);
            $empresa->update($data);
            return response()->json($empresa, 200);
        }
        catch (\Exception $e) {
            return response()->json($e->getMessage(), 401);
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

            $empresa = $this->realState->findOrFail($id);
            $empresa->delete();
            return response()->json($empresa, 200);
        }
        catch (\Exception $e) {
            return response()->json($e->getMessage(), 401);
        }
    }
}
