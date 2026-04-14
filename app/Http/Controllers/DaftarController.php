<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DaftarController extends Controller
{
    public function index()
    {
        return view('daftar-form');
    }
    public function daftar(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => [
                'required',
                'regex:/^[a-zA-Z\s]*$/',
            ],
            'addres' => [
                'required',
                'max:300',
            ],
            'date' => [
                'required',
                'date',
            ],
            'password' => [
                'required',
                'min:8',
                'regex:/[A-Z]/', // Harus ada huruf kapital
                'regex:/[0-9]/', // Harus ada angka
            ],
            'confirm' => [
                'required',
                'same:password', // Harus sama dengan password
            ],
        ], [
            'name.regex' => 'Nama tidak boleh mengandung angka.',
            'password_confirmation.same' => 'Confirm Password tidak sesuai.',
        ]);

        $pageData['name']       = $request->name;
        $pageData['password']   = $request->password;
        $pageData['address']    = $request->address;
        $pageData['confirm']    = $request->confirm;
        $pageData['date']       = $request->date;

        return view('login-form', $pageData);
        //return redirect('/login');
    }
}
