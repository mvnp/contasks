<?php

namespace App\Http\Controllers;

use App\Models\Tarefas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TarefaRequest;


class TarefasController extends Controller
{
    private $tarefas;

    public function __construct(Tarefas $tarefas)
    {
        $this->tarefas = $tarefas;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $tarefas = Tarefas::with('atividades', 'configTarefas')->get();
            return response()->json($tarefas, 200);
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
    public function store(TarefaRequest $request)
    {
        $data = $request->all();

        try {
            $tarefa = $this->tarefas->create($data);
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
            $tarefa = $this->tarefas->findOrFail($id);
            return response()->json(['data' => $tarefa], 200);
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
    public function update(TarefaRequest $request, $id)
    {
        $data = $request->all();

        try {
            $tarefa = $this->tarefas->findOrFail($id);
            $tarefa->update($data);
            return response()->json($tarefa, 200);
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

            $tarefa = $this->tarefas->findOrFail($id);
            $tarefa->delete();
            return response()->json($tarefa, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }
}
