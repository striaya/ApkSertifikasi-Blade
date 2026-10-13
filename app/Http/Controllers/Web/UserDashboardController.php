<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('user.dashboard', [
            'user' => $request->user(),
        ]);
    }
}
