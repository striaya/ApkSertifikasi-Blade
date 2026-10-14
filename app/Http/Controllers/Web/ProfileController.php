<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();

        return view('user.profile.index', compact('user'));
    }

    public function edit()
    {
        $user = auth()->user();

        return view('user.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'username' => ['required', 'string', 'max:50', Rule::unique('users', 'username')->ignore($user->id),
            ],
            'email' => ['required', 'email', 'max:50', Rule::unique('users', 'email')->ignore($user->id),
            ],
        ]);

        $user->update($validated);

        return redirect()
            ->route('user.profile')
            ->with('success', 'Profile berhasil diperbarui');
    }

    public function editPassword()
    {
        $user = auth()->user();

        return view('user.profile.password', compact('user'));
    }

    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => [
                'required',
                'current_password',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
        ], [
            'current_password.current_password' => 'Password lama yang kamu masukkan salah.',
            'password.min' => 'Password baru minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password baru tidak cocok.',
        ]);
        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()
            ->route('user.profile')
            ->with('success', 'Password berhasil diperbarui');
    }
}
