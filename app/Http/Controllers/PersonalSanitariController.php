<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalSanitari;

class PersonalSanitariController extends Controller
{
    public function index(Request $request)
    {
        $query = PersonalSanitari::query();

        if ($request->filled('search')) {
            $query->where('nom', 'like', '%' . $request->search . '%');
        }

        $personal = $query->orderBy('nom')->get();

        return view('personal_sanitari.index', compact('personal'));
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
            'torn' => 'required|in:dia,nit,irrellevant',
            'password' => 'required|string|min:4',
        ]);

        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        PersonalSanitari::create($data);

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
            'rol' => 'required|string|max:50',
            'torn' => 'required|in:dia,nit,irrellevant',
            'password' => 'nullable|string|min:4',
        ]);

        $data = $request->only(['nom', 'email', 'rol', 'torn']);

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $personal_sanitari->update($data);

        return redirect()->route('personal-sanitari.index')->with('success', 'Actualitzat correctament.');
    }

    public function destroy(PersonalSanitari $personal_sanitari)
    {
        $personal_sanitari->delete();
        return redirect()->route('personal-sanitari.index')->with('success', 'Eliminat correctament.');
    }
}
