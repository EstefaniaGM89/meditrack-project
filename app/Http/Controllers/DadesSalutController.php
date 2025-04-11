<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DadesSalut;

class DadesSalutController extends Controller
{
    public function index()
    {
        return response()->json(DadesSalut::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'usuari_id' => 'required|exists:usuaris,id',
            'tipus_dada' => 'required|string|max:100',
            'valor' => 'required|numeric',
            'unitats' => 'required|string|max:50',
            'data_registre' => 'required|date',
        ]);

        $dada = DadesSalut::create($request->all());
        return response()->json($dada, 201);
    }

    public function show($id)
    {
        return response()->json(DadesSalut::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'usuari_id' => 'required|exists:usuaris,id',
            'tipus_dada' => 'required|string|max:100',
            'valor' => 'required|numeric',
            'unitats' => 'required|string|max:50',
            'data_registre' => 'required|date',
        ]);

        $dada = DadesSalut::findOrFail($id);
        $dada->update($request->all());

        return response()->json($dada);
    }

    public function destroy($id)
    {
        DadesSalut::destroy($id);
        return response()->json(null, 204);
    }
}