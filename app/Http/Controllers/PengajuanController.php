<?php

namespace App\Http\Controllers;

use App\Models\PermohonanSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanController extends Controller
{
    public function Tampilpengajuan()
    {
        return view('pengajuan');
    }

    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jenis_surat' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string',
            
        ]);

        // Ambil email dari user yang sedang login
        $user = Auth::user();

        // Simpan data ke tabel permohonan_surats
        PermohonanSurat::create([
            'nama' => $validatedData['nama'],
            'alamat' => $validatedData['alamat'],
            'email' => $user->email, // Gunakan email dari user yang sedang login
            'jenis_surat' => $validatedData['jenis_surat'],
            'tanggal_lahir' => $validatedData['tanggal_lahir'],
            'jenis_kelamin' => $validatedData['jenis_kelamin'],
            'status' => 'Dalam Proses', // Status awal
        ]);

        session()->flash('success', 'Permohonan surat berhasil diajukan!');

        return redirect()->route('pengajuan')->with('success', 'Pengajuan berhasil!');
    }

    public function download($id)
    {
        $permohonan = PermohonanSurat::findOrFail($id);

        if ($permohonan->status !== 'Selesai') {
            return back()->with('error', 'Surat belum selesai.');
        }

        // Misalkan surat tersimpan di storage surat
        return response()->download(storage_path('app/surat/' . $permohonan->file_name));
    }
}
