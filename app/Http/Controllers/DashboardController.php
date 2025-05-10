<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pacient;
use App\Models\Medicament;
use App\Models\Recordatori;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtener las notificaciones no leídas del usuario autenticado
        $user = Auth::user();
        $notificacions = $user->unreadNotifications;  // Obtener solo las notificaciones no leídas

        // Obtener estadísticas para el Dashboard
        $pacientsCount = Pacient::count();
        $medicamentsCount = Medicament::count();
        $recordatorisCount = Recordatori::count();
        $lastPacient = Pacient::latest()->first();
        $lastRecordatori = Recordatori::with(['pacient', 'medicament'])->latest()->first();

        // Pasar las notificaciones al dashboard
        return view('layouts.dashboard', compact(
            'pacientsCount',
            'medicamentsCount',
            'recordatorisCount',
            'lastPacient',
            'lastRecordatori',
            'notificacions' // Pasar las notificaciones aquí
        ));
    }
}
