<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Gunakan ini untuk Auth


class LoginController extends Controller
{
    public function Tampilform()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cek kredensial pengguna
        if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {
            // Jika login sukses, arahkan ke halaman sesuai dengan peran
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('adminhome.index');
            } elseif ($user->role === 'user') {
                return redirect()->route('home');
            }
        }

        // Jika login gagal
        return redirect()->back()->withErrors(['message' => 'Username atau password salah'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Hapus sesi pengguna

        // Redirect ke halaman beranda
        return redirect()->route('beranda');
    }
}
