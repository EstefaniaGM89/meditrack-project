<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\PersonalSanitari;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = PersonalSanitari::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session(['sanitari_id' => $user->id]);
            return redirect()->route('dashboard');
        }

        return back()->with('error', 'Credencials incorrectes.');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:personal_sanitari',
            'password' => 'required|string|min:6',
            'rol' => 'nullable|string|max:50',
        ]);

        PersonalSanitari::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => $request->rol,
        ]);

        return redirect()->route('login')->with('success', 'Registre completat correctament.');
    }

    public function logout()
    {
        session()->forget('sanitari_id');
        return redirect()->route('login');
    }
}
