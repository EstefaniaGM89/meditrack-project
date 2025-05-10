@extends('layouts.app')

@section('title', 'Notificacions')

@section('content')
    <h2 class="text-2xl font-bold mb-6">🔔 Notificacions</h2>

    @if($notificacions->isEmpty())
        <div class="bg-yellow-100 text-yellow-800 p-4 rounded">
            No tens notificacions pendents.
        </div>
    @else
        {{-- Botón para marcar todas como leídas --}}
        <form method="POST" action="{{ route('notificacions.read-all') }}" class="mb-4">
            @csrf
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
                ✔️ Marcar totes com a llegides
            </button>
        </form>

        {{-- Listado de notificaciones --}}
        <ul class="space-y-4">
            @foreach($notificacions as $notificacio)
                <li class="bg-white shadow rounded p-4 flex justify-between items-start">
                    <div>
                        <p class="font-semibold text-gray-800">
                            {{ $notificacio->data['titol'] ?? 'Recordatori de Medicament' }}
                        </p>
                        <p class="text-gray-600 text-sm mt-1">
                            {{ $notificacio->data['missatge'] ?? 'Tens un recordatori pendent.' }}
                        </p>
                        <p class="text-gray-400 text-xs mt-2">
                            Rebut el {{ $notificacio->created_at->format('d/m/Y H:i') }}
                        </p>
                    </div>
                    <form method="POST" action="{{ route('notificacions.read', $notificacio->id) }}">
                        @csrf
                        <button type="submit"
                            class="text-sm bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 mt-1">
                            ✔️ Marcar com a llegida
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
