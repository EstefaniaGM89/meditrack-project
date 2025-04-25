<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DadesSalutController;
use App\Http\Controllers\MedicamentController;
use App\Http\Controllers\RecordatoriController;
use App\Http\Controllers\UsuariController;
use App\Models\Recordatori;
use App\Notifications\RecordatoriMedicament;

Route::get('/', function () {
    return view('layouts.dashboard');
})->name('dashboard');


// Rutas CRUD de usuarios
Route::resource('usuaris', UsuariController::class);

// Puedes añadir aquí las demás rutas necesarias para tu app
Route::resource('medicaments', MedicamentController::class);
Route::resource('dades-salut', DadesSalutController::class);
Route::resource('recordatoris', RecordatoriController::class);

// Ruta de prueba para notificaciones con Mailtrap
Route::get('/provamail', function () {
    $recordatori = Recordatori::with('usuari')->first();

    if (!$recordatori || !$recordatori->usuari) {
        return "No hi ha recordatoris o usuaris disponibles.";
    }

    $recordatori->usuari->notify(new RecordatoriMedicament($recordatori));

    return "✅ Notificació enviada! Revisa Mailtrap.";
});
