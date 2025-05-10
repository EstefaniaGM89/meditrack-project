<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicament;

class MedicamentController extends Controller
{
    public function index()
    {
        $medicaments = Medicament::all();
        return view('medicaments.index', compact('medicaments'));
    }

    public function create()
    {
        return view('medicaments.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'dosi' => 'required|string|max:50',
            'descripcio' => 'nullable|string',
        ]);

        Medicament::create($validated);

        return redirect()->route('medicaments.index')->with('success', 'Medicament creat correctament.');
    }

    public function show($id)
    {
        $medicament = Medicament::findOrFail($id);
        return view('medicaments.show', compact('medicament'));
    }

    public function edit($id)
    {
        $medicament = Medicament::findOrFail($id);
        return view('medicaments.edit', compact('medicament'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'dosi' => 'required|string|max:50',
            'descripcio' => 'nullable|string',
        ]);

        $medicament = Medicament::findOrFail($id);
        $medicament->update($validated);

        return redirect()->route('medicaments.index')->with('success', 'Medicament actualitzat correctament.');
    }

    public function destroy($id)
    {
        Medicament::destroy($id);
        return redirect()->route('medicaments.index')->with('success', 'Medicament eliminat correctament.');
    }
}
