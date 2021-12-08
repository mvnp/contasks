<?php

namespace App\Http\Controllers;

use App\Models\ConfigSetores;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ConfigSetorRequest;

class ConfigSetoresController extends Controller
{
    private $configSetores;

    public function __construct(ConfigSetores $configSetores)
    {
        $this->configSetores = $configSetores;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $configSetores = $this->configSetores->orderBy('id', 'desc')->get();
            return response()->json($configSetores, 200);
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
    public function store(ConfigSetorRequest $request)
    {
        $data = $request->all();

        try {
            $configSetores = $this->configSetores->create($data);
            return response()->json($configSetores, 200);
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
            $configSetores = $this->configSetores->findOrFail($id);
            return response()->json(['data' => $configSetores], 200);
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
    public function update(ConfigSetorRequest $request, $id)
    {
        $data = $request->all();

        try {
            $configSetores = $this->configSetores->findOrFail($id);
            $configSetores->update($data);
            return response()->json($configSetores, 200);
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

            $configSetores = $this->configSetores->findOrFail($id);
            $configSetores->delete();
            return response()->json($configSetores, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
