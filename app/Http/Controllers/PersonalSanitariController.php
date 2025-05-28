<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalSanitari;

class PersonalSanitariController extends Controller
{
    public function index(Request $request)
    {
        $query = PersonalSanitari::query();

        // Filtrar per nom, cognoms o rol
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nom', 'like', "%$search%")
                    ->orWhere('cognoms', 'like', "%$search%")
                    ->orWhere('rol', 'like', "%$search%");
            });
        }

        // Ordenació
        $sort = $request->get('sort', 'recent');

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

        $personal = $query->paginate(10);

        return view('personal_sanitari.index', compact('personal', 'sort'));
    }

    public function create()
    {
        return view('personal_sanitari.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:10',
            'cognoms' => 'required|string|max:20',
            'email' => 'required|email|unique:personal_sanitari',
            'rol' => 'required|string|max:10',
            'torn' => 'required|in:dia,nit,irrellevant',
            'password' => 'required|string|min:4',
        ], [
            'nom.required' => 'El nom és obligatori.',
            'nom.max' => 'El nom no pot tenir més de 10 caràcters.',
            'cognoms.required' => 'Els cognoms són obligatoris.',
            'cognoms.max' => 'Els cognoms no poden tenir més de 20 caràcters.',
            'email.required' => 'L\'email és obligatori.',
            'email.email' => 'L\'email no és vàlid.',
            'email.unique' => 'Aquest email ja està en ús.',
            'rol.max' => 'El rol no pot tenir més de 10 caràcters.',
            'rol.required' => 'El rol és obligatori.',
            'torn.required' => 'Selecciona un torn.',
            'password.required' => 'La contrasenya és obligatòria.',
            'password.min' => 'La contrasenya ha de tenir almenys 4 caràcters.',
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
        $rules = [
            'nom' => 'required|string|max:10',
            'cognoms' => 'required|string|max:20',
            'email' => 'required|email|unique:personal_sanitari,email,' . $personal_sanitari->id,
            'rol' => 'required|string|max:10',
            'torn' => 'required|in:dia,nit,irrellevant',
        ];

        // Si se quiere cambiar la contraseña, la validamos
        if ($request->filled('password')) {
            $rules['password'] = 'string|min:4';
        }

        $validated = $request->validate($rules, [
            'nom.required' => 'El nom és obligatori.',
            'nom.max' => 'El nom no pot tenir més de 10 caràcters.',
            'cognoms.required' => 'Els cognoms són obligatoris.',
            'cognoms.max' => 'Els cognoms no poden tenir més de 20 caràcters.',
            'email.required' => 'L\'email és obligatori.',
            'email.email' => 'L\'email no és vàlid.',
            'email.unique' => 'Aquest correu electrònic ja està registrat.',
            'rol.required' => 'El rol és obligatori.',
            'rol.max' => 'El rol no pot tenir més de 10 caràcters.',
            'torn.required' => 'Selecciona un torn.',
            'torn.in' => 'El torn seleccionat no és vàlid.',
            'password.min' => 'La contrasenya ha de tenir almenys 4 caràcters.',
        ]);

        $data = $request->only(['nom', 'cognoms', 'email', 'rol', 'torn']);

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
