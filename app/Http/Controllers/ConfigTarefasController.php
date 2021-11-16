<?php

namespace App\Http\Controllers;

use App\Models\ConfigTarefas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigTarefasController extends Controller
{
    private $configTarefas;

    public function __construct(ConfigTarefas $configTarefas)
    {
        $this->configTarefas = $configTarefas;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $configTarefas = ConfigTarefas::with('configAtividades')->get();
            return response()->json($configTarefas, 200);
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
            $configTarefas = $this->configTarefas->create($data);
            return response()->json($configTarefas, 200);
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
            $configTarefas = $this->configTarefas->findOrFail($id);
            return response()->json(['data' => $configTarefas], 200);
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
            $configTarefas = $this->configTarefas->findOrFail($id);
            $configTarefas->update($data);
            return response()->json($configTarefas, 200);
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

            $configTarefas = $this->configTarefas->findOrFail($id);
            $configTarefas->delete();
            return response()->json($configTarefas, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }
}
