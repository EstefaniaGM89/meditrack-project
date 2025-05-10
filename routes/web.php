<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DadesSalutController;
use App\Http\Controllers\MedicamentController;
use App\Http\Controllers\RecordatoriController;
use App\Http\Controllers\PacientController;
use App\Http\Controllers\PersonalSanitariController;
use App\Http\Controllers\NotificacioController;

use App\Models\Pacient;
use App\Models\Medicament;
use App\Models\Recordatori;
use App\Notifications\RecordatoriMedicament;

// 🏠 Ruta del dashboard amb estadístiques
Route::get('/', function () {
    $pacientsCount = Pacient::count();
    $medicamentsCount = Medicament::count();
    $recordatorisCount = Recordatori::count();
    $lastPacient = Pacient::latest()->first();
    $lastRecordatori = Recordatori::with(['pacient', 'medicament'])->latest()->first();

    return view('layouts.dashboard', compact(
        'pacientsCount',
        'medicamentsCount',
        'recordatorisCount',
        'lastPacient',
        'lastRecordatori'
    ));
})->name('dashboard');

// 🔁 CRUD de les entitats
Route::resource('pacients', PacientController::class);
Route::resource('medicaments', MedicamentController::class);
Route::resource('dades-salut', DadesSalutController::class);
Route::resource('recordatoris', RecordatoriController::class);
Route::resource('personal-sanitari', PersonalSanitariController::class);

// 🔔 Notificacions (visualització i marcat com a llegides)



// 📬 Ruta de prova per notificacions
Route::get('/provamail', function () {
    $recordatori = Recordatori::with('pacient')->first();

    if (!$recordatori || !$recordatori->pacient) {
        return "No hi ha recordatoris o pacients disponibles.";
    }

    $recordatori->pacient->notify(new RecordatoriMedicament($recordatori));

    return "✅ Notificació enviada! Revisa Mailtrap.";
});
