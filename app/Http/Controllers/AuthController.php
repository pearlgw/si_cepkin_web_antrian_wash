<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function dologin(Request $request)
    {
        // validasi
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt($credentials)) {

            // buat ulang session login
            $request->session()->regenerate();

            if (auth()->user()->role_id === 1) {
                // jika user superadmin
                return redirect()->intended('/admin');
            } else {
                // jika user pegawai
                return redirect()->intended('/customer');
            }
        }

        // jika email atau password salah
        // kirimkan session error
        return back()->with('error', 'email atau password salah');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function signup() {
        return view('auth.register');
    }

    public function signuppost(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'no_telp' => 'required',
        ], [
            'name.required' => 'Nama harus diisi.',
            'no_telp.required' => 'No telepon harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Isi dengan email yang sesuai',
            'password.required' => 'Password harus diisi.',
        ]);

        $user = new User([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'no_telp' => $validatedData['no_telp'],
            'role_id' => 2,
        ]);

        $user->save();

        return redirect('/sign-in')->with('success', 'Success! Silahkan Lakukan Sign-In');
    }
}