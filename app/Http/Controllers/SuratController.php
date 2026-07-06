<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class SuratController extends Controller
{
    /**
     * Dashboard Warga
     */
    public function dashboard()
    {
        $riwayat_Surat = Surat::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('warga.dashboard', compact('riwayat_Surat'));
    }

    /**
     * Riwayat Pengajuan Surat Warga
     */
    public function index()
    {
        $riwayat_Surat = Surat::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('warga.riwayat_surat', compact('riwayat_Surat'));
    }

    /**
     * Halaman Ajukan Surat
     */
    public function create(Request $request)
    {
        $jenis = $request->query('jenis');

        return view('warga.ajukan_surat', compact('jenis'));
    }

    /**
     * Simpan Pengajuan Surat
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_surat' => 'required|string',
        ]);

        $dataTambahan = $request->except([
            '_token',
            'jenis_surat'
        ]);

        Surat::create([
            'user_id'        => Auth::id(),
            'jenis_surat'    => $request->jenis_surat,
            'data_tambahan'  => $dataTambahan,
            'status'         => 'pending',
        ]);

        return redirect()
            ->route('warga.surat.index')
            ->with('success', 'Surat permohonan Anda berhasil dikirim!');
    }

    /**
     * Cetak Surat
     */
    public function cetak($id)
    {
        $surat = Surat::findOrFail($id);

        $pdf = Pdf::loadView('warga.cetak_surat', compact('surat'))
            ->setPaper('a4', 'portrait');

        return $pdf->stream('Surat_Keterangan_' . $surat->id . '.pdf');
    }

    /**
     * Halaman Admin Kelola Surat
     */
    public function adminIndex()
    {
        $semuaSurat = Surat::with('user')
            ->latest()
            ->get();

        return view('admin.kelola_surat', compact('semuaSurat'));
    }

    /**
     * Update Status Surat
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:selesai,ditolak',
        ]);

        $surat = Surat::findOrFail($id);

        $surat->update([
            'status' => $request->status,
            'keterangan_ditolak' => $request->status == 'ditolak'
                ? $request->keterangan
                : null,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Status surat berhasil diperbarui!');
    }

    /**
     * Hapus Pengajuan Surat
     */
    public function destroy($id)
    {
        $surat = Surat::findOrFail($id);

        $surat->delete();

        return redirect()
            ->back()
            ->with('success', 'Data pengajuan surat berhasil dihapus!');
    }
}