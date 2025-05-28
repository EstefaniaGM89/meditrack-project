<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DadesSalutController,
    MedicamentController,
    RecordatoriController,
    PacientController,
    PersonalSanitariController
};
use App\Http\Controllers\Auth\LoginController;
use App\Models\{Pacient, Medicament, Recordatori};
use App\Notifications\RecordatoriMedicament;

/* Rutes públiques: Login i Register */
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [LoginController::class, 'register'])->name('register.post');

/* Logout ruta protegida*/
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

/* Rutes protegides per auth */
Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        $pacientsCount = \App\Models\Pacient::count();
        $medicamentsCount = \App\Models\Medicament::count();
        $recordatorisCount = \App\Models\Recordatori::count();
        $lastPacient = \App\Models\Pacient::latest()->first();
        $lastRecordatori = \App\Models\Recordatori::with(['pacient', 'medicament'])->latest()->first();
        $recordatorisPendents = \App\Models\Recordatori::where('estat', 'pendent')->get();

        return view('layouts.dashboard', compact(
            'pacientsCount',
            'medicamentsCount',
            'recordatorisCount',
            'lastPacient',
            'lastRecordatori',
            'recordatorisPendents'
        ));
    })->name('dashboard');


    Route::resource('pacients', PacientController::class);
    Route::resource('medicaments', MedicamentController::class);
    Route::resource('dades-salut', DadesSalutController::class);
    Route::resource('recordatoris', RecordatoriController::class);
    Route::resource('personal-sanitari', PersonalSanitariController::class);

    Route::get('/provamail', function () {
        $recordatori = Recordatori::with('pacient')->first();

        if (!$recordatori || !$recordatori->pacient) {
            return "No hi ha recordatoris o pacients disponibles.";
        }

        $recordatori->pacient->notify(new RecordatoriMedicament($recordatori));
        return "Notificació enviada! Revisa Mailtrap.";
    });
});
