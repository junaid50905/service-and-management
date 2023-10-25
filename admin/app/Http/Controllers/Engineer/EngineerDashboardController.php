<?php

namespace App\Http\Controllers\Engineer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EngineerDashboardController extends Controller
{
    // dashboard
    public function dashboard()
    {
        return view('engineer.dashboard');
    }
}
