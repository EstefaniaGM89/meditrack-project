<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pacient;

class PacientController extends Controller
{

    public function index(Request $request)
    {
        $sort = $request->get('sort', 'recent');
        $query = Pacient::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nom', 'like', '%' . $search . '%')
                    ->orWhere('cognoms', 'like', '%' . $search . '%');
            });
        }

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

        $pacients = $query->paginate(10);
        return view('pacients.index', compact('pacients', 'sort'));
    }

    public function create()
    {
        return view('pacients.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:25',
            'cognoms' => 'required|string|max:25',
            'genere' => 'required|in:Home,Dona',
            'email' => 'required|string|email|max:50|unique:pacients',
            'data_naixement' => 'required|date',
            'num_document' => 'required|string|unique:pacients',
            'telefon' => 'required|string|max:12',
            'adreca' => 'nullable|string|max:255',
            'ciutat' => 'nullable|string|max:25',
            'codi_postal' => 'nullable|string|max:5',
            'provincia' => 'required|in:Alacant,Albacete,Almeria,Avila,Badajoz,Barcelona,Burgos,Cadiz,Cantabria,Castellon,Ciudad Real,Cordoba,Cuenca,Girona,Granada,Guadalajara,Huelva,Huesca,Jaen,La Rioja,Lleida,Lugo,Madrid,Malaga,Murcia,Navarra,Ourense,Palencia,Pontevedra,Salamanca,Segovia,Sevilla,Soria,Tarragona,Teruel,Toledo,Valencia,Valladolid,Vizcaya,Zamora,Zaragoza',
            'observacions' => 'nullable|string',
            'alergies' => 'nullable|string',
            'medicaments' => 'nullable|string',
            'antecedents' => 'nullable|string',
            'vacunes' => 'nullable|string',
            'metode_contacte' => 'nullable|string|max:100',
        ], [
            'nom.required' => 'El nom és obligatori.',
            'cognoms.required' => 'Els cognoms són obligatoris.',
            'genere.required' => 'El gènere és obligatori.',
            'email.required' => 'L\'email és obligatori.',
            'data_naixement.required' => 'La data de naixement és obligatòria.',
            'num_document.required' => 'El número de document és obligatori.',
            'telefon.required' => 'El telèfon és obligatori.',
            'num_document.unique' => 'El número de document ja existeix.',
            'telefon.max' => 'El telèfon no pot tenir més de 12 caràcters.',
            'ciutat.max' => 'La ciutat no pot tenir més de 25 caràcters.',
            'codi_postal.max' => 'El codi postal no pot tenir més de 5 caràcters.',
            'provincia.required' => 'Escull una província.',
        ]);
        
        Pacient::create($validated);
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
        $validated = $request->validate([
            'nom' => 'required|string|max:25',
            'cognoms' => 'required|string|max:25',
            'genere' => 'required|in:Home,Dona',
            'email' => 'required|email|max:50|unique:pacients,email,' . $id,
            'data_naixement' => 'required|date',
            'num_document' => 'required|string|unique:pacients,num_document,' . $id,
            'telefon' => 'required|string|max:12',
            'adreca' => 'nullable|string|max:255',
            'ciutat' => 'nullable|string|max:25',
            'codi_postal' => 'nullable|string|max:5',
            'provincia' => 'required|in:Alacant,Albacete,Almeria,Avila,Badajoz,Barcelona,Burgos,Cadiz,Cantabria,Castellon,Ciudad Real,Cordoba,Cuenca,Girona,Granada,Guadalajara,Huelva,Huesca,Jaen,La Rioja,Lleida,Lugo,Madrid,Malaga,Murcia,Navarra,Ourense,Palencia,Pontevedra,Salamanca,Segovia,Sevilla,Soria,Tarragona,Teruel,Toledo,Valencia,Valladolid,Vizcaya,Zamora,Zaragoza',
            'observacions' => 'nullable|string',
            'alergies' => 'nullable|string',
            'medicaments' => 'nullable|string',
            'antecedents' => 'nullable|string',
            'vacunes' => 'nullable|string',
            'metode_contacte' => 'nullable|string|max:100',
        ], [
            'nom.required' => 'El nom és obligatori.',
            'cognoms.required' => 'Els cognoms són obligatoris.',
            'genere.required' => 'El gènere és obligatori.',
            'email.required' => 'L\'email és obligatori.',
            'data_naixement.required' => 'La data de naixement és obligatòria.',
            'num_document.required' => 'El número de document és obligatori.',
            'telefon.required' => 'El telèfon és obligatori.',
            'num_document.unique' => 'El número de document ja existeix.',
            'telefon.max' => 'El telèfon no pot tenir més de 12 caràcters.',
            'ciutat.max' => 'La ciutat no pot tenir més de 25 caràcters.',
            'codi_postal.max' => 'El codi postal no pot tenir més de 5 caràcters.',
            'provincia.required' => 'Escull una província.',
        ]);

        $pacient = Pacient::findOrFail($id);
        $pacient->update($validated);

        return redirect()->route('pacients.index')->with('success', 'Pacient actualitzat correctament.');
    }

    public function destroy($id)
    {
        Pacient::destroy($id);
        return redirect()->route('pacients.index')->with('success', 'Pacient eliminat correctament.');
    }
}
