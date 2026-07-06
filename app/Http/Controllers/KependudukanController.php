<?php

namespace App\Http\Controllers;

use App\Models\Kependudukan;
use App\Models\User;
use Illuminate\Http\Request;

class KependudukanController extends Controller
{
    public function index(){
        $datas = Kependudukan::with('user')->get();
        return view('admin.kependudukan', compact('datas'));
    }

    public function destroy($id)
{
    $warga = Kependudukan::findOrFail($id);
    $userId = $warga->user_id;
    $warga->delete();

    if ($userId) {
        User::where('id', $userId)->delete();
    }

    return redirect()->back()->with('success', 'Data warga dan akun login berhasil dihapus!');
}

public function edit($id)
{
    // Ambil data warga beserta data user (akun)-nya menggunakan relasi 'with'
    $warga = Kependudukan::with('user')->findOrFail($id);
    
    return view('admin.edit', compact('warga'));
}

/**
 * Memproses perubahan data dari form edit kependudukan
 */
public function update(Request $request, $id)
{
    // 1. Cari data kependudukan berdasarkan ID
    $warga = Kependudukan::findOrFail($id);

    // 2. Validasi data yang dikirim dari form edit
    $request->validate([
        'name'              => 'required|string|max:255',
        'nik'               => 'required|string|max:16|unique:kependudukans,nik,' . $id, // Mengabaikan NIK milik warga ini sendiri agar tidak dianggap duplikat
        'tempat_lahir'      => 'required|string|max:255',
        'tanggal_lahir'     => 'required|date',
        'jenis_kelamin'     => 'required|string',
        'alamat'            => 'required|string|max:255',
        'rt_rw'             => 'required|string|max:255',
        'agama'             => 'required|string|max:255',
        'pekerjaan'         => 'required|string|max:255',
        'status_perkawinan' => 'required|string',
    ]);

    // 3. Update data di tabel kependudukans
    $warga->update([
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

    // 4. Update juga nama warga di tabel users (karena nama terikat ke akun users)
    if ($warga->user_id) {
        User::where('id', $warga->user_id)->update([
            'name' => $request->name
        ]);
    }

    // 5. Kembali ke halaman utama kependudukan dengan pesan sukses
    return redirect()->route('kependudukan.index')->with('success', 'Data kependudukan warga berhasil diperbarui!');
}
}
