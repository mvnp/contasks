<?php

namespace App\Http\Controllers;

use App\Models\ConfigTarefas;
use Illuminate\Http\Request;
<<<<<<< HEAD
=======
use App\Models\ConfigAtividades;
>>>>>>> e891fe806676204f84157f001765362ae6c34f36
use App\Http\Controllers\Controller;

class ConfigAtividadesController extends Controller
{
<<<<<<< HEAD

    private $configtarefas;

    public function __construct(ConfigTarefas $configtarefas)
    {
        $this->configtarefas = $configtarefas;
=======
    private $configAtividades;

    public function __construct(ConfigAtividades $configAtividades)
    {
        $this->configAtividades = $configAtividades;
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
>>>>>>> e891fe806676204f84157f001765362ae6c34f36
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $configtarefas = $this->ConfigTarefas->get();
            return response()->json($configtarefas, 200);
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
            $tarefa = $this->ConfigTarefas->create($data);
            return response()->json($tarefa, 200);
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
            $configtarefa = $this->ConfigTarefas->findOrFail($id);
            return response()->json(['data' => $configtarefa], 200);
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
            $configtarefa = $this->ConfigTarefas->findOrFail($id);
            $configtarefa->update($data);
            return response()->json($configtarefa, 200);
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

            $configtarefa = $this->ConfigTarefas->findOrFail($id);
            $configtarefa->delete();
            return response()->json($configtarefa, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }
}
