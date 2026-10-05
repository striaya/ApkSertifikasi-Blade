<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Peserta, Skema};

class DashboardController extends Controller
{
    public function index() {
        return view('dashboard', [
            'totalPeserta' => Peserta::count(),
            'totalSkema' => Skema::count(),
            'pesertaTerbaru' => Peserta::with('skema')->latest()->take(5)->get()
        ]);
    }
}
