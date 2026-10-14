<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RiwayatPendaftaranController extends Controller
{
    public function index()
    {
        $peserta = Peserta::with('skema')
            ->where('user_id', auth()->id())
            ->first();

        return view('user.riwayat', compact('peserta'));
    }
}
