<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicament;

class MedicamentController extends Controller
{
    public function index()
    {
        return response()->json(Medicament::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'usuari_id' => 'required|exists:usuaris,id',
            'nom' => 'required|string|max:255',
            'descripcio' => 'nullable|string',
        ]);

        $medicament = Medicament::create($request->all());
        return response()->json($medicament, 201);
    }

    public function show($id)
    {
        return response()->json(Medicament::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'usuari_id' => 'required|exists:usuaris,id',
            'nom' => 'required|string|max:255',
            'descripcio' => 'nullable|string',
        ]);

        $medicament = Medicament::findOrFail($id);
        $medicament->update($request->all());

        return response()->json($medicament);
    }

    public function destroy($id)
    {
        Medicament::destroy($id);
        return response()->json(null, 204);
    }
}
