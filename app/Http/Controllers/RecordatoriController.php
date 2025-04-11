<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recordatori;
use App\Models\Usuari;
use App\Notifications\RecordatoriMedicament;

class RecordatoriController extends Controller
{
    public function index()
    {
        return response()->json(Recordatori::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'usuari_id' => 'required|exists:usuaris,id',
            'medicament' => 'required|string|max:255',
            'dosificacio' => 'required|string|max:100',
            'data_hora' => 'required|date',
        ]);

        $recordatori = Recordatori::create($request->all());
        $usuari = Usuari::find($request->usuari_id);
        if ($usuari) {
            $usuari->notify(new RecordatoriMedicament($recordatori));
        }
        // Aquí podríem enviar una notificació al usuari si calgués


        return response()->json($recordatori, 201);
    }

    public function show($id)
    {
        return response()->json(Recordatori::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'usuari_id' => 'required|exists:usuaris,id',
            'medicament' => 'required|string|max:255',
            'dosificacio' => 'required|string|max:100',
            'data_hora' => 'required|date',
        ]);

        $recordatori = Recordatori::findOrFail($id);
        $recordatori->update($request->all());

        return response()->json($recordatori);
    }

    public function destroy($id)
    {
        Recordatori::destroy($id);
        return response()->json(null, 204);
    }
}