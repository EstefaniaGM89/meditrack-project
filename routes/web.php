<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DadesSalutController;
use App\Http\Controllers\MedicamentController;
use App\Http\Controllers\RecordatoriController;
use App\Http\Controllers\PacientController;
use App\Http\Controllers\PersonalSanitariController;
use App\Models\Recordatori;
use App\Notifications\RecordatoriMedicament;

Route::get('/', function () {
    return view('layouts.dashboard');
})->name('dashboard');

// Rutas CRUD
Route::resource('pacients', PacientController::class);
Route::resource('medicaments', MedicamentController::class);
Route::resource('dades_salut', DadesSalutController::class);
Route::resource('recordatoris', RecordatoriController::class);
Route::resource('personal_sanitari', PersonalSanitariController::class);


// Ruta de prova per a notificacions
Route::get('/provamail', function () {
    $recordatori = Recordatori::with('pacient')->first();

    if (!$recordatori || !$recordatori->pacient) {
        return "No hi ha recordatoris o pacients disponibles.";
    }

    $recordatori->pacient->notify(new RecordatoriMedicament($recordatori));

    return "✅ Notificació enviada! Revisa Mailtrap.";
});
