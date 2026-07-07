<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kependudukan; // Panggil model Kependudukan agar bisa menyimpan data warga
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister(){
        return view('auth.register');
    }

public function register(Request $request){
    // 1. Validasi Semua Inputan Lengkap dari Form Warga
    $request->validate([
        'name'              => 'required|string|max:255',
        'nik'               => 'required|string|max:16|unique:kependudukans,nik',
        'tempat_lahir'      => 'required|string|max:255',
        'tanggal_lahir'     => 'required|date',
        'jenis_kelamin'     => 'required|string',
        'alamat'            => 'required|string|max:255',
        'rt_rw'             => 'required|string|max:255',
        'agama'             => 'required|string|max:255',
        'pekerjaan'         => 'required|string|max:255',
        'status_perkawinan' => 'required|string',
        'email'             => 'required|string|email|unique:users,email',
        'password'          => 'required|string|min:6|confirmed',
    ]);

    // 2. Buat Akun User Baru (Murni Tanpa NIK di tabel users)
    $user = User::create([
        'name'     => $request->name,
        'email'    => $request->email,
        'password' => Hash::make($request->password),
        'role'     => 'warga' 
    ]);

    // 3. Masukkan Data Kependudukan Lengkap (Sertakan user_id agar terhubung)
    Kependudukan::create([
        'user_id'           => $user->id, // <-- UTAMA: Ambil ID dari user yang baru dibuat di atas
        'nik'               => $request->nik,
        'tempat_lahir'      => $request->tempat_lahir,
        'tanggal_lahir'     => $request->tanggal_lahir,
        'jenis_kelamin'     => $request->jenis_kelamin,
        'alamat'            => $request->alamat,
        'rt_rw'             => $request->rt_rw, 
        'agama'             => $request->agama,
        'pekerjaan'         => $request->pekerjaan,
        'status_perkawinan' => $request->status_perkawinan,
    ]);
    
    return redirect()->route('login')->with('success', 'Registrasi Berhasil! Silahkan Login');
}

    public function showLogin(){
        return view('auth.login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // Validasi Login di Database
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            if(Auth::user()->role === 'warga'){
                return redirect()->route('warga.dashboard');
            } else {
                return redirect()->route('admin.dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login');
    }
}