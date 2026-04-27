<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filterableColumns = ['role'];

        $searchableColumns = ['name',
            'email',
            'password'];

        $pageData['dataUser'] = User::filter($request, $filterableColumns, $searchableColumns)->paginate(2)->withQueryString();
        return view('admin.user.index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageData['dataUser'] = User::all();
        return view('admin.user.create', $pageData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'name' => ['required', 'max:200'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:3'],
            'role' => ['required', 'in:SuperAdministrator,Administrator'],
        ]);

        // Membuat array data
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ];

        // Proses upload avatar jika ada
        if ($request->hasFile('avatar')) {
            // Membuat nama unik untuk file gambar
            $avatarName = time() . '.' . $request->avatar->extension();

            // Memindahkan file ke folder public/storage/avatars
            $request->avatar->move(public_path('storage/avatars'), $avatarName);

            // Menyimpan nama file ke dalam data
            $data['avatar'] = $avatarName;
        }

        // Menyimpan data ke dalam database
        User::create($data);

        // Redirect dengan pesan sukses
        return redirect()->route('user.list')->with('success', 'Penambahan Data Berhasil!');
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
    public function edit(string $param1)
    {
        $pageData['dataUser'] = User::findOrFail($param1);
        return view('admin.user.edit', $pageData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'name' => ['required', 'max:200'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['nullable', 'min:8'],
            'role' => ['required', 'in:SuperAdministrator,Administrator'],
        ]);

        $id = $request->id;
        $user = User::findOrFail($id);

        // Update atribut user
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        // Update password jika ada
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password); // Enkripsi password
        }

        // Update avatar jika file baru diunggah
        if ($request->hasFile('avatar')) {
            // Hapus avatar lama jika ada
            if ($user->avatar && file_exists(public_path('storage/avatars/' . $user->avatar))) {
                unlink(public_path('storage/avatars/' . $user->avatar));
            }

            // Simpan file avatar baru
            $avatarName = time() . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('storage/avatars'), $avatarName);
            $user->avatar = $avatarName;
        }

        // Simpan perubahan ke database
        $user->save();

        return redirect()->route('user.list')->with('success', 'Perubahan Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $param1)
    {
        $user = User::findOrFail($param1);
        $user->delete();
        return redirect()->route('user.list')->with('success', 'Penghapusan Data Berhasil!');
    }
}
