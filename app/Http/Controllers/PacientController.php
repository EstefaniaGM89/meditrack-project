<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pacient;
use Illuminate\Support\Facades\Hash;

class PacientController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->get('sort', 'recent'); // Valor per defecte
        $query = Pacient::query();

        // 🔍 Cerca per nom o cognoms
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nom', 'like', '%' . $search . '%')
                    ->orWhere('cognoms', 'like', '%' . $search . '%');
            });
        }

        // 🧭 Ordenació
        switch ($sort) {
            case 'alphabetical':
                $query->orderBy('nom')->orderBy('cognoms');
                break;
            case 'reverse':
                $query->orderByDesc('nom')->orderByDesc('cognoms');
                break;
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            case 'recent':
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }

        // 📄 Resultats paginats
        $pacients = $query->paginate(10);

        return view('pacients.index', compact('pacients', 'sort'));
    }

    public function create()
    {
        return view('pacients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pacients',
            'data_naixement' => 'required|date',
            'num_document' => 'nullable|string|unique:pacients',
            'telefon' => 'nullable|string|max:30',
            'adreca' => 'nullable|string|max:255',
            'ciutat' => 'nullable|string|max:100',
            'codi_postal' => 'nullable|string|max:10',
            'provincia' => 'nullable|string|max:100',
            'observacions' => 'nullable|string',
            'alergies' => 'nullable|string',
            'medicaments' => 'nullable|string',
            'antecedents' => 'nullable|string',
            'vacunes' => 'nullable|string',
            'metode_contacte' => 'nullable|string|max:100',
        ]);

        Pacient::create($request->all());

        return redirect()->route('pacients.index')->with('success', 'Pacient creat correctament.');
    }

    public function show($id)
    {
        $pacient = Pacient::findOrFail($id);
        return view('pacients.show', compact('pacient'));
    }

    public function edit($id)
    {
        $pacient = Pacient::findOrFail($id);
        return view('pacients.edit', compact('pacient'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'cognoms' => 'required|string|max:255',
            'genere' => 'required|string|max:10',
            'email' => 'required|email|max:255|unique:pacients,email,' . $id,
            'data_naixement' => 'required|date',
            'num_document' => 'nullable|string|unique:pacients,num_document,' . $id,
            'telefon' => 'nullable|string|max:30',
            'adreca' => 'nullable|string|max:255',
            'ciutat' => 'nullable|string|max:100',
            'codi_postal' => 'nullable|string|max:5',
            'provincia' => 'nullable|string|max:100',
            'observacions' => 'nullable|string',
            'alergies' => 'nullable|string',
            'medicaments' => 'nullable|string',
            'antecedents' => 'nullable|string',
            'vacunes' => 'nullable|string',
            'metode_contacte' => 'nullable|string|max:100',
        ]);

        $pacient = Pacient::findOrFail($id);

        $data = $request->except('pass');

        $pacient->update($data);

        return redirect()->route('pacients.index')->with('success', 'Pacient actualitzat correctament.');
    }


    public function destroy($id)
    {
        Pacient::destroy($id);
        return redirect()->route('pacients.index')->with('success', 'Pacient eliminat correctament.');
    }
}
