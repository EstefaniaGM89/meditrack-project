<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pacient;
use Illuminate\Support\Facades\Hash;

class PacientController extends Controller
{
    public function index()
    {
        $pacients = Pacient::all();
        return view('pacients.index', compact('pacients'));
    }

    public function create()
    {
        return view('pacients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom'              => 'required|string|max:255',
            'email'            => 'required|string|email|max:255|unique:pacients',
            'pass'             => 'required|string|min:4',
            'data_naixement'   => 'required|date',
            'num_document'     => 'nullable|string|unique:pacients',
            'telefon'          => 'nullable|string|max:30',
            'adreca'           => 'nullable|string|max:255',
            'ciutat'           => 'nullable|string|max:100',
            'codi_postal'      => 'nullable|string|max:10',
            'provincia'        => 'nullable|string|max:100',
            'pais'             => 'nullable|string|max:100',
            'observacions'     => 'nullable|string',
            'alergies'         => 'nullable|string',
            'medicaments'      => 'nullable|string',
            'antecedents'      => 'nullable|string',
            'vacunes'          => 'nullable|string',
            'metode_contacte'  => 'nullable|string|max:100',
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
            'nom'              => 'required|string|max:255',
            'email'            => 'required|string|email|max:255|unique:pacients,email,' . $id,
            'pass'             => 'nullable|string|min:6',
            'data_naixement'   => 'required|date',
            'num_document'     => 'nullable|string|unique:pacients,num_document,' . $id,
            'telefon'          => 'nullable|string|max:30',
            'adreca'           => 'nullable|string|max:255',
            'ciutat'           => 'nullable|string|max:100',
            'codi_postal'      => 'nullable|string|max:10',
            'provincia'        => 'nullable|string|max:100',
            'pais'             => 'nullable|string|max:100',
            'observacions'     => 'nullable|string',
            'alergies'         => 'nullable|string',
            'medicaments'      => 'nullable|string',
            'antecedents'      => 'nullable|string',
            'vacunes'          => 'nullable|string',
            'metode_contacte'  => 'nullable|string|max:100',
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
