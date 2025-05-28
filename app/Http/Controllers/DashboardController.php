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
        // Obtenir les notificacions no llegides de l'usuari autenticat
        $user = Auth::user();
        $notificacions = $user->unreadNotifications;  // Obtenir notificacions no llegides

        // Obtenir les dades per al dashboard
        $pacientsCount = Pacient::count();
        $medicamentsCount = Medicament::count();
        $recordatorisCount = Recordatori::count();
        $lastPacient = Pacient::latest()->first();
        $lastRecordatori = Recordatori::with(['pacient', 'medicament'])->latest()->first();

        // Aquí podria afegir la llògica per a les notificacions, com marcar-les com llegides
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
