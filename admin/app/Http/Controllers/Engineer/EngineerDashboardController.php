<?php

namespace App\Http\Controllers\Engineer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\RecruitingEngineer;


class EngineerDashboardController extends Controller
{
    // dashboard
    public function dashboard()
    {
        if (session()->has('loginId')) {
            $loggedInEngineer = session()->get('loginId');
        }
        $totalTasks = RecruitingEngineer::where('engineer_id', $loggedInEngineer)->get()->count();
        return view('engineer.dashboard', compact('totalTasks'));
    }
}
