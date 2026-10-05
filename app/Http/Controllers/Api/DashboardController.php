<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\{Peserta, Skema};
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return response()->json([
            'total_peserta' => Peserta::count(),
            'total_skema' => Skema::count(),
            'peserta_terbaru' => Peserta::with('skema')->latest()->take(5)->get(),
        ]);
    }
}
