@extends('layouts.app')

@section('content')
<div class="container">
    <h2>LLista de Pacients</h2>
    <a href="{{ route('pacients.create') }}" class="btn btn-primary mb-3">Nou Pacient</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Data de naixement</th>
                <th>Accions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pacients as $pacient)
                <tr>
                    <td>{{ $pacient->id }}</td>
                    <td>{{ $pacient->nom }}</td>
                    <td>{{ $pacient->email }}</td>
                    <td>{{ $pacient->data_naixement }}</td>
                    <td>
                        <a href="{{ route('pacients.edit', $pacient->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('pacients.destroy', $pacient->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Segur que vols eliminar aquest pacient?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection