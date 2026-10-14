<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AkunController extends Controller
{
    public function index()
    {
        $akun = User::latest()->paginate(10);

        return view('akun.index', compact('akun'));
    }

    public function create()
    {
        return view('akun.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'username' => ['required', 'string', 'max:50', 'unique:users,username'],
            'email' => ['required', 'email', 'max:50', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required', Rule::in(['admin', 'user'])],
        ]);

        User::create([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        return redirect()
            ->route('akun.index')
            ->with('success', 'Akun berhasil ditambahkan');
    }

    public function edit(User $akun)
    {
        return view('akun.edit', compact('akun'));
    }

    public function update(Request $request, User $akun)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users', 'username')->ignore($akun->id),
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($akun->id),
            ],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'role' => ['required', Rule::in(['admin', 'user'])],
        ]);

        if (
            $akun->id === auth()->id()
            && $validated['role'] !== $akun->role
        ) {
            return back()
                ->withInput()
                ->withErrors([
                    'role' => 'Role akun yang sedang digunakan tidak bisa diubah.',
                ]);
        }

        $akun->name = $validated['name'];
        $akun->username = $validated['username'];
        $akun->email = $validated['email'];
        $akun->role = $validated['role'];

        if (! empty($validated['password'])) {
            $akun->password = Hash::make($validated['password']);
        }

        $akun->save();

        return redirect()
            ->route('akun.index')
            ->with('success', 'Akun berhasil diperbarui.');
    }

    public function destroy(User $akun)
    {
        if($akun->id === auth()->id()) {
            return redirect()
                ->route('akun.index')
                ->with('error', 'Akun yang sedang digunakan tidak bisa dihapus');
        }
        $akun->delete();

        return redirect()
            ->route('akun.index')
            ->with('success', 'Akun berhasil dihapus');
    }
}
