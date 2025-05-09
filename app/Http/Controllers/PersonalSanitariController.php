<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalSanitari;
use Illuminate\Support\Facades\Hash;

class PersonalSanitariController extends Controller
{
    public function index()
    {
        $personal = PersonalSanitari::all();
        return view('personal_sanitari.index', compact('personal'));
    }

    public function create()
    {
        return view('personal_sanitari.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom'     => 'required|string|max:255',
            'rol'     => 'nullable|string|max:50',
            'email'   => 'required|email|unique:personal_sanitari,email',
            'password'=> 'required|string|min:6',
        ]);

        $request['password'] = Hash::make($request['password']);
        PersonalSanitari::create($request->all());

        return redirect()->route('personal-sanitari.index')->with('success', 'Personal sanitari registrat correctament.');
    }

    public function edit($id)
    {
        $persona = PersonalSanitari::findOrFail($id);
        return view('personal_sanitari.edit', compact('persona'));
    }

    public function update(Request $request, $id)
    {
        $persona = PersonalSanitari::findOrFail($id);

        $request->validate([
            'nom'     => 'required|string|max:255',
            'rol'     => 'nullable|string|max:50',
            'email'   => 'required|email|unique:personal_sanitari,email,' . $persona->id,
            'password'=> 'nullable|string|min:6',
        ]);

        if ($request->filled('password')) {
            $request['password'] = Hash::make($request['password']);
        } else {
            unset($request['password']);
        }

        $persona->update($request->all());

        return redirect()->route('personal-sanitari.index')->with('success', 'Dades actualitzades correctament.');
    }

    public function destroy($id)
    {
        PersonalSanitari::destroy($id);
        return redirect()->route('personal-sanitari.index')->with('success', 'Personal eliminat correctament.');
    }
}
