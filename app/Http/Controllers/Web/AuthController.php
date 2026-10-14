<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Peserta;
use App\Models\Skema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('welcome');
    }

    public function showRegister()
    {
        $skemas = Skema::orderBy('nama_skema')->get();

        return view('auth.register', compact('skemas'));
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt($credentials)) {
            return back()
                ->withErrors([
                    'username' => 'Username atau password salah.',
                ])
                ->onlyInput('username');
        }

        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->route('dashboard');
        }

        if ($user->role === 'user') {
            return redirect()->route('user.dashboard');
        }

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->withErrors([
                'username' => 'Role akun tidak dikenali.',
            ]);
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'username' => [
                'required', 'string', 'max:50', 'unique:users,username',
            ],
            'email' => [
                'required', 'email', 'max:50', 'unique:users,email',
            ],
            'nik' => [
                'required', 'regex:/^[0-9]{16}$/', 'unique:pesertas,nik',
            ],
            'no_telepon' => [
                'required', 'regex:/^[0-9]{10,13}$/',
            ],
            'tempat_lahir' => [
                'required', 'string', 'max:100',
            ],
            'tanggal_lahir' => [
                'required', 'date', 'before_or_equal:today',
            ],
            'alamat' => [
                'required', 'string', 'max:2000',
            ],
            'skema_id' => [
                'required', 'integer', 'exists:skemas,id',
            ],
            'password' => [
                'required', 'string', 'min:8',
            ],
        ], [
            'nik.regex' => 'NIK harus terdiri dari tepat 16 digit angka.',
            'nik.unique' => 'NIK sudah terdaftar.',
            'no_telepon.regex' => 'Nomor telepon harus terdiri dari 10–13 digit angka.',
            'tanggal_lahir.before_or_equal' => 'Tanggal lahir tidak boleh melebihi hari ini.',
            'skema_id.exists' => 'Skema sertifikasi yang dipilih tidak valid.',
        ]);

        DB::transaction(function () use ($validated) {
            User::create([
                'name' => $validated['name'],
                'username' => $validated['username'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => 'user',
            ]);

            do {
                $noPeserta = 'PST'.random_int(1000000, 9999999);
            } while (Peserta::where('no_peserta', $noPeserta)->exists());

            Peserta::create([
                'no_peserta' => $noPeserta,
                'nama' => $validated['name'],
                'email' => $validated['email'],
                'nik' => $validated['nik'],
                'no_telepon' => $validated['no_telepon'],
                'tempat_lahir' => $validated['tempat_lahir'],
                'tanggal_lahir' => $validated['tanggal_lahir'],
                'alamat' => $validated['alamat'],
                'skema_id' => $validated['skema_id'],
            ]);
        });

        return redirect()
            ->route('login')
            ->with('success', 'Pendaftaran berhasil. Silakan login.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('welcome');
    }
}
