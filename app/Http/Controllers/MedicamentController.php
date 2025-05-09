<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicament;
use App\Models\Pacient;

class MedicamentController extends Controller
{
    public function index()
    {
        $medicaments = Medicament::all();
        return view('medicaments.index', compact('medicaments'));
    }

    public function create()
    {
        $pacients = Pacient::all();
        return view('medicaments.create', compact('pacients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pacient_id'  => 'required|exists:pacients,id',
            'nom'         => 'required|string|max:255',
            'descripcio'  => 'nullable|string',
            'dosi'        => 'nullable|string|max:100',
            'inici'       => 'required|date',
            'fi'          => 'nullable|date',
        ]);

        Medicament::create($request->all());

        return redirect()->route('medicaments.index')->with('success', 'Medicament creat correctament.');
    }

    public function edit($id)
    {
        $medicament = Medicament::findOrFail($id);
        $pacients = Pacient::all();
        return view('medicaments.edit', compact('medicament', 'pacients'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pacient_id'  => 'required|exists:pacients,id',
            'nom'         => 'required|string|max:255',
            'descripcio'  => 'nullable|string',
            'dosi'        => 'nullable|string|max:100',
            'inici'       => 'required|date',
            'fi'          => 'nullable|date',
        ]);

        $medicament = Medicament::findOrFail($id);
        $medicament->update($request->all());

        return redirect()->route('medicaments.index')->with('success', 'Medicament actualitzat correctament.');
    }

    public function destroy($id)
    {
        Medicament::destroy($id);
        return redirect()->route('medicaments.index')->with('success', 'Medicament eliminat correctament.');
    }
}
