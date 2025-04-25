@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lista de Usuarios</h2>
    <a href="{{ route('usuaris.create') }}" class="btn btn-primary mb-3">Nuevo Usuario</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Fecha de Nacimiento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuaris as $usuari)
                <tr>
                    <td>{{ $usuari->id }}</td>
                    <td>{{ $usuari->nom }}</td>
                    <td>{{ $usuari->email }}</td>
                    <td>{{ $usuari->data_naixement }}</td>
                    <td>
                        <a href="{{ route('usuaris.edit', $usuari->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('usuaris.destroy', $usuari->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que quieres eliminar este usuario?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection