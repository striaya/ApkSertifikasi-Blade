<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function login(Request $request)
{
    $credentials = $request->validate(
        [
            'username' => 'required',
            'password' => 'required',
        ],
        [
            'required' => ':attribute wajib diisi.',
        ]
    );

    $user = User::whereRaw(
        'BINARY username = ?',
        [$credentials['username']]
    )->first();

    if ($user && Hash::check($credentials['password'], $user->password)) {
        Auth::login($user);
        $request->session()->regenerate();

        if ($user->role === 'admin') {
            return redirect()->intended(route('dashboard'));
        }

        return redirect()->route('welcome');
    }

    return back()
        ->withErrors([
            'username' => 'Username atau password salah.',
        ])
        ->onlyInput('username');
}

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'username' => 'required|string|max:50|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
    ]);

    $user = User::create([
        'name' => $validated['name'],
        'username' => $validated['username'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'role' => 'user',
    ]);

    return redirect()
        ->route('login')
        ->with('success', 'Registrasi berhasil. Silakan login.');
}
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
