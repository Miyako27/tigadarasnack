<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function index()
    {
        // //Penerapan Auth::check()
        // if (Auth::check()) {
        //     return redirect()->route('dashboard');
        // }
        $pageData['result'] = '';
        return view('login-form', $pageData);
    }
    public function login(Request $request)
    {
        //kode validasi
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:3'],
        ]);

        //Pengecekan Email & Password menggunakan Hash::check()
        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('dashboard')->with('success', true);
        }

        //Kode jika gagal validasi kembali ke halaman login
        return redirect()->route('auth')->with('error', 'Email Tidak Terdaftar');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman Form Login
        return redirect()->route('auth');
    }

    public function loginHome()
    {
        return redirect()->route('dashboard');
    }

    //quiz
    public function show_forgot_password(Request $request)
    {
        //validasi di form, requered
        return view('forgot-form');
    }

    public function do_forgot_password(Request $request)
    {
        //validasi di form, requered
        // dd($request->email);

        if ($request->email == '2357301079@mahasiswa.pcr.ac.id') {
            return redirect()->route('login.forgot')->with('success', $request->email);
        } else {
            return redirect()->route('login.forgot')->with('error', true);
        }
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')
        ->with(['prompt' => 'select_account'])
        ->redirect();
        //return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
        $email_user = $googleUser->email;
        //dd($email_user);
        //Pengecekan Email & Password menggunakan
        $user = User::where('email', $email_user)->first();
        if ($user) {
            Auth::login($user);
            return redirect()->route('dashboard')->with('success', true);
        }

        //Kode jika gagal validasi kembali ke halaman login
        return redirect()->route('auth')->with('error', 'Email Tidak Terdaftar');
    }


}
