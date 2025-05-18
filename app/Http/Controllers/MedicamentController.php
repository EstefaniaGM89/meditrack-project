<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicament;

class MedicamentController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->get('sort', 'recent');

        $query = Medicament::query();

        if ($request->filled('search')) {
            $query->where('nom', 'like', '%' . $request->search . '%');
        }

        switch ($sort) {
            case 'alphabetical':
                $query->orderBy('nom', 'asc');
                break;
            case 'reverse':
                $query->orderBy('nom', 'desc');
                break;
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            case 'recent':
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }

        $medicaments = $query->paginate(10);

        return view('medicaments.index', compact('medicaments', 'sort'));
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
