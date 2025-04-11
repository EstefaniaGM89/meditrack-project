<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuari;
use Illuminate\Support\Facades\Hash;

class UsuariController extends Controller
{
    public function index()
    {
        return response()->json(Usuari::all());
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
        $usuari = Usuari::create($request->all());

        return response()->json($usuari, 201);
    }

    public function show($id)
    {
        return response()->json(Usuari::findOrFail($id));
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

        return response()->json($usuari);
    }

    public function destroy($id)
    {
        Usuari::destroy($id);
        return response()->json(null, 204);
    }
}