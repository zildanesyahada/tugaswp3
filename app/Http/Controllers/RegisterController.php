<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Menampilkan form registrasi
    public function showRegistrationForm()
    {
        return view('backend.v_register.register', [
            'judul' => 'Register',
        ]); 
    }

    // Menangani proses registrasi
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'hp' => 'required|string|max:13',
        ]);

        // Menyimpan pengguna baru
        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash password sebelum disimpan
            'hp' => $request->hp,
            'status' => 1, // Misalkan kita aktifkan status secara default
        ]);

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('backend.login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
