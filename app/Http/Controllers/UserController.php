<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index', [
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create', [
            'roles' => Role::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'no_telp' => 'required|integer',
            'role_id' => 'required'
        ]);

        $user = new User([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'no_telp' => $validatedData['no_telp'],
            'role_id' => $validatedData['role_id'],
        ]);

        $user->save();

        return redirect('/users')->with('success', 'Berhasil Menambahkan Data User');
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
        return view('admin.user.edit', [
            'userr' => User::where('id', $id)->first(),
            'user' => auth()->user()->name,
            'roles' => Role::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'no_telp' => 'required|integer',
            'role_id' => 'required'
        ]);

        // Simpan password yang belum di-hash untuk validasi
        $password = $validatedData['password'];

        // Hash password
        $validatedData['password'] = Hash::make($password);

        // Update data pengguna
        User::find($id)->update($validatedData);

        return redirect('/users')->with('success', 'Berhasil Update Data User');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);

        return redirect('/users')->with('success', 'Data Telah Dihapus');
    }
}