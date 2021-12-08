<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConfigAtividades;
use App\Http\Controllers\Controller;
use App\Http\Requests\ConfigAtividadeRequest;

class ConfigAtividadesController extends Controller
{
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
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConfigAtividadeRequest $request)
    {
        $data = $request->all();

        try {
            $configAtividades = $this->configAtividades->create($data);
            return response()->json($configAtividades, 200);
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
            $configAtividades = $this->configAtividades->findOrFail($id);
            return response()->json(['data' => $configAtividades], 200);
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
    public function update(ConfigAtividadeRequest $request, $id)
    {
        $data = $request->all();

        try {
            $configAtividades = $this->configAtividades->findOrFail($id);
            $configAtividades->update($data);
            return response()->json($configAtividades, 200);
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

            $configAtividades = $this->configAtividades->findOrFail($id);
            $configAtividades->delete();
            return response()->json($configAtividades, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
