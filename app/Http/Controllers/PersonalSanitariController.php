<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalSanitari;

class PersonalSanitariController extends Controller
{
    public function index()
    {
        $personals = PersonalSanitari::all();
        return view('personal_sanitari.index', compact('personals'));
    }

    public function create()
    {
        return view('personal_sanitari.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:personal_sanitari',
            'rol' => 'nullable|string|max:50',
        ]);

        PersonalSanitari::create($request->all());

        return redirect()->route('personal-sanitari.index')->with('success', 'Personal creat correctament.');
    }

    public function edit(PersonalSanitari $personal_sanitari)
    {
        return view('personal_sanitari.edit', ['persona' => $personal_sanitari]);
    }

    public function update(Request $request, PersonalSanitari $personal_sanitari)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:personal_sanitari,email,' . $personal_sanitari->id,
            'rol' => 'nullable|string|max:50',
        ]);

        $personal_sanitari->update($request->all());

        return redirect()->route('personal-sanitari.index')->with('success', 'Actualitzat correctament.');
    }

    public function destroy(PersonalSanitari $personal_sanitari)
    {
        $personal_sanitari->delete();
        return redirect()->route('personal-sanitari.index')->with('success', 'Eliminat correctament.');
    }
}
