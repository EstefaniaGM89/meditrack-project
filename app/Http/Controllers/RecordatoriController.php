<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recordatori;
use App\Models\Pacient;
use App\Models\Medicament;
use App\Notifications\RecordatoriMedicament;

class RecordatoriController extends Controller
{
    public function index(Request $request)
    {
        $query = Recordatori::with(['pacient', 'medicament']);

        // Cerca per nom o cognoms del pacient
        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('pacient', function ($q) use ($search) {
                $q->where('nom', 'like', "%$search%")
                    ->orWhere('cognoms', 'like', "%$search%");
            });
        }

        // Filtrar només pendents si s'ha sol·licitat
        if ($request->filled('filtre') && $request->filtre === 'pendents') {
            $query->where('estat', 'pendent');
        }

        // Ordenació dinàmica
        $sort = $request->get('sort', 'recent');
        switch ($sort) {
            case 'alphabetical':
                $query->orderBy(
                    Pacient::select('nom')
                        ->whereColumn('pacients.id', 'recordatoris.pacient_id'),
                    'asc'
                )->orderBy(
                        Pacient::select('cognoms')
                            ->whereColumn('pacients.id', 'recordatoris.pacient_id'),
                        'asc'
                    );
                break;
            case 'reverse':
                $query->orderBy(
                    Pacient::select('nom')
                        ->whereColumn('pacients.id', 'recordatoris.pacient_id'),
                    'desc'
                )->orderBy(
                        Pacient::select('cognoms')
                            ->whereColumn('pacients.id', 'recordatoris.pacient_id'),
                        'desc'
                    );
                break;
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            case 'recent':
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }

        $recordatoris = $query->paginate(10);

        return view('recordatoris.index', compact('recordatoris', 'sort'));
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
            'fi' => 'required|date|after_or_equal:inici',
            'hora' => 'required|date_format:H:i',
            'dies_setmana' => 'required|array',
            'dies_setmana.*' => 'in:Dilluns,Dimarts,Dimecres,Dijous,Divendres,Dissabte,Diumenge',
        ], [
            'pacient_id.required' => 'Selecciona un pacient.',
            'medicament_id.required' => 'Selecciona un medicament.',
            'missatge.required' => 'El missatge és obligatori.',
            'inici.required' => 'La data d\'inici és obligatòria.',
            'fi.required' => 'La data de fi és obligatòria.',
            'fi.after_or_equal' => 'La data de fi ha de ser posterior o igual a la data d\'inici.',
            'hora.required' => 'Posa una hora.',
            'dias_setmana.required' => 'Selecciona els dies de la setmana.',
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
            'fi' => 'required|date|after_or_equal:inici',
            'hora' => 'required|date_format:H:i',
            'dies_setmana' => 'required|array',
            'dies_setmana.*' => 'in:Dilluns,Dimarts,Dimecres,Dijous,Divendres,Dissabte,Diumenge',
        ], [
            'pacient_id.required' => 'Selecciona un pacient.',
            'medicament_id.required' => 'Selecciona un medicament.',
            'missatge.required' => 'El missatge és obligatori.',
            'inici.required' => 'La data d\'inici és obligatòria.',
            'fi.required' => 'La data de fi és obligatòria.',
            'fi.after_or_equal' => 'La data de fi ha de ser posterior o igual a la data d\'inici.',
            'hora.required' => 'Posa una hora.',
            'dias_setmana.required' => 'Selecciona els dies de la setmana.',
    
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
