<?php

namespace App\Http\Controllers;

use App\Models\Empresas;
use App\Models\Atividades;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AtividadeRequest;

class AtividadesController extends Controller
{
    private $atividades;

    public function __construct(Atividades $atividades)
    {
        $this->atividades = $atividades;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $atividades = Atividades::with('empresas', 'configSetores', 'configAtividades')->get();
            return response()->json($atividades, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AtividadeRequest $request)
    {
        $data = $request->all();

        try {
            $atividades = $this->atividades->create($data);
            return response()->json($atividades, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
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
            $atividades = $this->atividades->findOrFail($id);
            return response()->json(['data' => $atividades], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AtividadeRequest $request, $id)
    {
        $data = $request->all();

        try {
            $atividades = $this->atividades->findOrFail($id);
            $atividades->update($data);
            return response()->json($atividades, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
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

            $atividades = $this->atividades->findOrFail($id);
            $atividades->delete();
            return response()->json($atividades, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
