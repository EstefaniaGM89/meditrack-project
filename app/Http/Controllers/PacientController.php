<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pacient;
use Illuminate\Support\Facades\Hash;

class PacientController extends Controller
{
    public function index(Request $request)
    {
        $query = Pacient::query();

        if ($request->filled('search')) {
            $query->where('nom', 'like', '%' . $request->search . '%');
        }

        $pacients = $query->orderBy('nom')->paginate(10);

        return view('pacients.index', compact('pacients'));
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
            'pass' => 'required|string|min:4',
            'data_naixement' => 'required|date',
            'num_document' => 'nullable|string|unique:pacients',
            'telefon' => 'nullable|string|max:30',
            'adreca' => 'nullable|string|max:255',
            'ciutat' => 'nullable|string|max:100',
            'codi_postal' => 'nullable|string|max:10',
            'provincia' => 'nullable|string|max:100',
            'pais' => 'nullable|string|max:100',
            'observacions' => 'nullable|string',
            'alergies' => 'nullable|string',
            'medicaments' => 'nullable|string',
            'antecedents' => 'nullable|string',
            'vacunes' => 'nullable|string',
            'metode_contacte' => 'nullable|string|max:100',
        ], [
            'nom.required' => 'Has d’introduir un nom.',
            'email.required' => 'Has d’introduir un correu electrònic.',
            'email.email' => 'El correu electrònic no és vàlid.',
            'email.unique' => 'Aquest correu electrònic ja està registrat.',
            'pass.required' => 'Has d’introduir una contrasenya.',
            'pass.min' => 'La contrasenya ha de tenir almenys :min caràcters.',
            'data_naixement.required' => 'Has d’introduir la data de naixement.',
            'data_naixement.date' => 'La data de naixement no és vàlida.',
            'num_document.unique' => 'El número de document ja està registrat.',
        ]);

        $request['pass'] = Hash::make($request['pass']);
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
            'email' => 'required|string|email|max:255|unique:pacients,email,' . $id,
            'pass' => 'nullable|string|min:6',
            'data_naixement' => 'required|date',
            'num_document' => 'nullable|string|unique:pacients,num_document,' . $id,
            'telefon' => 'nullable|string|max:30',
            'adreca' => 'nullable|string|max:255',
            'ciutat' => 'nullable|string|max:100',
            'codi_postal' => 'nullable|string|max:10',
            'provincia' => 'nullable|string|max:100',
            'pais' => 'nullable|string|max:100',
            'observacions' => 'nullable|string',
            'alergies' => 'nullable|string',
            'medicaments' => 'nullable|string',
            'antecedents' => 'nullable|string',
            'vacunes' => 'nullable|string',
            'metode_contacte' => 'nullable|string|max:100',
        ], [
            'nom.required' => 'Has d’introduir un nom.',
            'email.required' => 'Has d’introduir un correu electrònic.',
            'email.email' => 'El correu electrònic no és vàlid.',
            'email.unique' => 'Aquest correu electrònic ja està registrat.',
            'pass.min' => 'La contrasenya ha de tenir almenys :min caràcters.',
            'data_naixement.required' => 'Has d’introduir la data de naixement.',
            'data_naixement.date' => 'La data de naixement no és vàlida.',
            'num_document.unique' => 'El número de document ja està registrat.',
        ]);

        $pacient = Pacient::findOrFail($id);

        if ($request->filled('pass')) {
            $request['pass'] = Hash::make($request['pass']);
        } else {
            $request->request->remove('pass');
        }

        $pacient->update($request->all());

        return redirect()->route('pacients.index')->with('success', 'Pacient actualitzat correctament.');
    }

    public function destroy($id)
    {
        Pacient::destroy($id);
        return redirect()->route('pacients.index')->with('success', 'Pacient eliminat correctament.');
    }
}
