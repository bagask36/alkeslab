<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login'); // Pastikan Anda memiliki view ini
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek kredensial
        if (Auth::attempt($request->only('email', 'password'))) {
            // Jika berhasil, redirect ke dashboard
            return redirect()->intended('/dashboard');
        }

        // Jika gagal, redirect kembali dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput($request->only('email')); // Mengingat email yang diinput
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Anda telah logout');
    }
}
