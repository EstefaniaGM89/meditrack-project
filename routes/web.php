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

/*
|--------------------------------------------------------------------------
| Rutas públicas: login y registro
|--------------------------------------------------------------------------
*/
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [LoginController::class, 'register'])->name('register.post');

/*
|--------------------------------------------------------------------------
| Logout protegido
|--------------------------------------------------------------------------
*/
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

/*
|--------------------------------------------------------------------------
| Rutas protegidas por auth
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

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
