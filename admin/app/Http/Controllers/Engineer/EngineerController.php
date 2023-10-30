<?php

namespace App\Http\Controllers\Engineer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\RecruitingEngineer;



class EngineerController extends Controller
{
    // recentlyAssignedTasks
    public function totalTasks()
    {
        if (session()->has('loginId')) {
            $loggedInEngineer = session()->get('loginId');
        }
        $totalTasks = RecruitingEngineer::where('engineer_id', $loggedInEngineer)->orderBy('id', 'desc')->get();
        return view('engineer.total_tasks.index', compact('totalTasks'));
    }

    // 
}
