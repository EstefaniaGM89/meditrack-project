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
        $recordatoris = Recordatori::all();
        return view('recordatoris.index', compact('recordatoris'));
    }

    public function create()
    {
        $usuaris = \App\Models\Usuari::all();
        $medicaments = \App\Models\Medicament::all();
        return view('recordatoris.create', compact('usuaris', 'medicaments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'usuaris_id' => 'required|exists:usuaris,id',
            'medicaments_id' => 'required|exists:medicaments,id',
            'missatge' => 'required|string|max:255',
            'data_hora' => 'nullable|date',
            'hora' => 'nullable|date_format:H:i',
            'dies_setmana' => 'nullable|array',
            'dies_setmana.*' => 'in:Dilluns,Dimarts,Dimecres,Dijous,Divendres,Dissabte,Diumenge',
        ]);

        if (isset($validated['dies_setmana'])) {
            $validated['dies_setmana'] = json_encode($validated['dies_setmana']);
        }

        $recordatori = Recordatori::create($validated);

        $usuari = Usuari::find($validated['usuaris_id']);
        if ($usuari) {
            $usuari->notify(new RecordatoriMedicament($recordatori));
        }

        return redirect()->route('recordatoris.index')->with('success', 'Recordatori creat correctament.');
    }

    public function show($id)
    {
        $recordatori = Recordatori::findOrFail($id);
        return view('recordatoris.show', compact('recordatori'));
    }

    public function edit($id)
    {
        $recordatori = Recordatori::findOrFail($id);
        return view('recordatoris.edit', compact('recordatori'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'usuaris_id' => 'required|exists:usuaris,id',
            'medicaments_id' => 'required|exists:medicaments,id',
            'missatge' => 'required|string|max:255',
            'data_hora' => 'nullable|date',
            'hora' => 'nullable|date_format:H:i',
            'dies_setmana' => 'nullable|array',
            'dies_setmana.*' => 'in:Dilluns,Dimarts,Dimecres,Dijous,Divendres,Dissabte,Diumenge',
        ]);

        if (isset($validated['dies_setmana'])) {
            $validated['dies_setmana'] = json_encode($validated['dies_setmana']);
        }

        $recordatori = Recordatori::findOrFail($id);
        $recordatori->update($validated);

        return redirect()->route('recordatoris.index')->with('success', 'Recordatori actualitzat correctament.');
    }

    public function destroy($id)
    {
        Recordatori::destroy($id);
        return redirect()->route('recordatoris.index')->with('success', 'Recordatori eliminat correctament.');
    }
}
