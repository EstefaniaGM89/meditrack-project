<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuari;
use Illuminate\Support\Facades\Hash;

class UsuariController extends Controller
{
    public function index()
    {
        $usuaris = Usuari::all();
        return view('usuaris.index', compact('usuaris'));
    }

    public function create()
    {
        return view('usuaris.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuaris',
            'pass' => 'required|string|min:4',
            'data_naixement' => 'required|date',
        ]);

        $request['pass'] = Hash::make($request['pass']);
        Usuari::create($request->all());

        return redirect()->route('usuaris.index')->with('success', 'Usuario creado correctamente.');
    }

    public function show($id)
    {
        $usuari = Usuari::findOrFail($id);
        return view('usuaris.show', compact('usuari'));
    }

    public function edit($id)
    {
        $usuari = Usuari::findOrFail($id);
        return view('usuaris.edit', compact('usuari'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuaris,email,' . $id,
            'pass' => 'nullable|string|min:6',
            'data_naixement' => 'required|date',
        ]);

        $usuari = Usuari::findOrFail($id);

        if ($request->filled('pass')) {
            $request['pass'] = Hash::make($request['pass']);
        } else {
            $request->request->remove('pass');
        }

        $usuari->update($request->all());

        return redirect()->route('usuaris.index')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy($id)
    {
        Usuari::destroy($id);
        return redirect()->route('usuaris.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
