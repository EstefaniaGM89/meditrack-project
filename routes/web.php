<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DadesSalutController;
use App\Http\Controllers\MedicamentController;
use App\Http\Controllers\RecordatoriController;
use App\Http\Controllers\UsuariController;
use App\Models\Recordatori;

use App\Notifications\RecordatoriMedicament;

Route::get('/provamail', function () {
    $recordatori = Recordatori::with('usuari')->first(); // Asegúrate de que exista uno
    if (!$recordatori || !$recordatori->usuari) {
        return "No hi ha recordatoris o usuaris disponibles.";
    }

    $recordatori->usuari->notify(new RecordatoriMedicament($recordatori));

    return "✅ Notificació enviada! Revisa Mailtrap.";
});
