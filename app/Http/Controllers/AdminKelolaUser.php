<?php

namespace App\Http\Controllers;

use App\Models\PermohonanSurat;
use App\Models\User;
use Illuminate\Http\Request;

class AdminKelolaUser extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('adminkelolauser', ['users' => $users]);
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

        $validatedData = $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|email|unique:users', // Validasi email
            'password' => 'required|string|min:8|max:255',
            'role' => 'required|in:admin,user',
        ]);

        User::create([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'], // Simpan email
            'password' => bcrypt($validatedData['password']),
            'role' => $validatedData['role'],
        ]);

        return redirect()->route('adminkelolauser.index')->with('success', 'Data berhasil ditambahkan');
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

        $user = User::findOrFail($id);
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id, 
            'password' => 'nullable|string|min:6',
            'role' => 'required|in:admin,user',
        ]);

        // Update data pengguna
        $user->username = $request->input('username');
        $user->email = $request->input('email'); // Update email

        // Hanya update password jika ada yang baru
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        // Update role
        $user->role = $request->input('role');

        // Simpan perubahan
        $user->save();

        return redirect()->route('adminkelolauser.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()->route('adminkelolauser.index')->with('success', 'data berhasil di tambahkan');
    }
}
