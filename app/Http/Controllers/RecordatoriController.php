<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recordatori;
use App\Models\Pacient;
use App\Models\Medicament;
use App\Notifications\RecordatoriMedicament;

class RecordatoriController extends Controller
{
    public function index()
    {
        $recordatoris = Recordatori::with(['pacient.medicaments', 'medicament'])->get();
        return view('recordatoris.index', compact('recordatoris'));
    }

    public function create()
    {
        $pacients = Pacient::all();
        $medicaments = Medicament::all();
        return view('recordatoris.create', compact('pacients', 'medicaments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pacient_id' => 'required|exists:pacients,id',
            'medicament_id' => 'required|exists:medicaments,id',
            'missatge' => 'required|string|max:255',
            'inici' => 'required|date',
            'fi' => 'nullable|date|after_or_equal:inici',
            'data_hora' => 'nullable|date',
            'hora' => 'nullable|date_format:H:i',
            'dies_setmana' => 'nullable|array',
            'dies_setmana.*' => 'in:Dilluns,Dimarts,Dimecres,Dijous,Divendres,Dissabte,Diumenge',
        ]);

        if (isset($validated['dies_setmana'])) {
            $validated['dies_setmana'] = json_encode($validated['dies_setmana']);
        }

        $recordatori = Recordatori::create($validated);

        $pacient = Pacient::find($validated['pacient_id']);
        if ($pacient) {
            $pacient->notify(new RecordatoriMedicament($recordatori));
        }

        return redirect()->route('recordatoris.index')->with('success', 'Recordatori creat correctament.');
    }

    public function edit($id)
    {
        $recordatori = Recordatori::findOrFail($id);
        $pacients = Pacient::all();
        $medicaments = Medicament::all();
        return view('recordatoris.edit', compact('recordatori', 'pacients', 'medicaments'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'pacient_id' => 'required|exists:pacients,id',
            'medicament_id' => 'required|exists:medicaments,id',
            'missatge' => 'required|string|max:255',
            'inici' => 'required|date',
            'fi' => 'nullable|date|after_or_equal:inici',
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
