<?php

namespace App\Http\Controllers;

use App\Models\permohonan_surat;
use App\Models\PermohonanSurat;
use App\Models\User;
use Illuminate\Container\Attributes\Log;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permohonansurat = PermohonanSurat::all();
        return view("adminhome", ['permohonan_surats' => $permohonansurat]);
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
    public function store(Request $request) {}

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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input dari pengguna
        $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'email' => 'required|string|email',
            'jenis_surat' => 'required|string',
            'status' => 'required|string',
            'tanggal_lahir' => 'required|date', // Validasi untuk tanggal lahir
            'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan', // Validasi untuk jenis kelamin
        ]);

        // Mencari data permohonan berdasarkan ID
        $permohonansurat = PermohonanSurat::findOrFail($id);

        // Mengupdate data permohonan dengan input dari pengguna
        $permohonansurat->nama = $request->input('nama');
        $permohonansurat->alamat = $request->input('alamat');
        $permohonansurat->email = $request->input('email');
        $permohonansurat->jenis_surat = $request->input('jenis_surat');
        $permohonansurat->status = $request->input('status');
        $permohonansurat->tanggal_lahir = $request->input('tanggal_lahir'); // Menambahkan tanggal lahir
        $permohonansurat->jenis_kelamin = $request->input('jenis_kelamin'); // Menambahkan jenis kelamin

        // Menyimpan perubahan ke database
        $permohonansurat->save();

        // Redirect ke halaman admin dengan pesan sukses
        return redirect()->route('adminhome.index')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permohonanSurat = PermohonanSurat::findOrFail($id);
        $permohonanSurat->delete();
        return redirect()->route('adminhome.index')->with('success', 'Data berhasil diupdate.');
    }

    public function indexshome (){

        $jmlhuser = User::where('role', 'user')->count();
        $jmlhsurat = PermohonanSurat::count();

      

        return view('home', [
            'jmlhsurat' => $jmlhsurat,
            'jmluser' => $jmlhuser,
        ]);
    }

    public function berandaview (){

        $jmlhuser = User::where('role', 'user')->count();
        $jmlhsurat = PermohonanSurat::count();

      

        return view('beranda', [
            'jmlhsurat' => $jmlhsurat,
            'jmluser' => $jmlhuser,
        ]);
    }
}
