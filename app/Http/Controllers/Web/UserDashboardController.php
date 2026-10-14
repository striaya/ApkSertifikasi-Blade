<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peserta;

class UserDashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $peserta = Peserta::with('skema')
            ->where('user_id', $user->id)
            ->first();

        return view('user.dashboard', compact('user', 'peserta'));
    }
}
