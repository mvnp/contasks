<?php

namespace App\Http\Controllers;

use App\Models\ConfigAtividades;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigAtividadesController extends Controller
{

    private $configAtividades;

    public function __construct(ConfigAtividades $confiAtividades)
    {
        $this->confiAtividades = $confiAtividades;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $configAtividades = $this->configAtividades->get();
            return response()->json($configAtividades, 200);
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
    public function store(Request $request)
    {
        $data = $request->all();

        try {
            $confiAtividades = $this->confiAtividades->create($data);
            return response()->json($confiAtividades, 200);
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
            $confiAtividades = $this->confiAtividades->findOrFail($id);
            return response()->json(['data' => $confiAtividades], 200);
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
    public function update(Request $request, $id)
    {
        $data = $request->all();

        try {
            $confiAtividades = $this->confiAtividades->findOrFail($id);
            $confiAtividades->update($data);
            return response()->json($confiAtividades, 200);
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

            $confiAtividades = $this->confiAtividades->findOrFail($id);
            $confiAtividades->delete();
            return response()->json($confiAtividades, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }
}
