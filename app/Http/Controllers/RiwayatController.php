<?php

namespace App\Http\Controllers;

use App\Models\PermohonanSurat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // Cek apakah user sudah login
        if (Auth::check()) {
            $user = Auth::user(); // Mendapatkan user yang sedang login

            // Mengambil data surat berdasarkan email user
            $permohonans = PermohonanSurat::where('email', $user->email)->get();

            // Kirim data ke view
            return view('riwayatPengajuan', compact('permohonans'));
        } else {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }
    }

    private function getSuratViewByJenis($jenis_surat)
    {
        switch ($jenis_surat) {
            case 'Surat Keterangan Tidak Mampu':
                return 'surat.sktm'; // Nama file blade
            case 'Surat Pengantar Pembuatan KK':
                return 'surat.sppk'; // Nama file blade
            case 'Surat Keterangan Berkelakuan Baik':
                return 'surat.skkb'; // Nama file blade
            default:
                return 'surat.default'; // Jika jenis surat tidak dikenali
        }
    }
    // Method untuk mengunduh surat
    public function download($id)
    {
        // Cari data permohonan surat berdasarkan ID
        $permohonan = PermohonanSurat::findOrFail($id);

        // Cek apakah status sudah "Selesai"
        if ($permohonan->status !== 'Selesai') {
            return redirect()->back()->with('error', 'Surat belum selesai diproses');
        }

        // Ambil template surat sesuai jenis surat
        $view = $this->getSuratViewByJenis($permohonan->jenis_surat);

        // Buat file PDF dari view surat
        $pdf = PDF::loadView($view, ['permohonan' => $permohonan]);

        // Set judul metadata PDF
        $pdf->setOption('title', 'Surat ' . $permohonan->jenis_surat);

        // Nama file dinamis
        $fileName = 'surat_' . $permohonan->jenis_surat . '.pdf';

        // Download PDF dengan nama file dinamis
        return $pdf->download($fileName);
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
