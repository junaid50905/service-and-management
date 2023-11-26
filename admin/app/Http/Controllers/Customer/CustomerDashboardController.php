<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Admin\Appiontment;
use Illuminate\Http\Request;

class CustomerDashboardController extends Controller
{
    // dashboard
    public function dashboard()
    {
        if (session()->has('loginId')) {
            $loggedInCustomer = session()->get('loginId');
        }
        $servicingProducts = Appiontment::where('user_id', $loggedInCustomer)->latest()->get();
        // $totalTasks = RecruitingEngineer::where('engineer_id', $loggedInEngineer)->get()->count();
        // $totalLateTasks = Appiontment::where('engineer_id', $loggedInEngineer)->where('status', 'late')->get()->count();
        // $totalCompletedTasks = Appiontment::where('engineer_id', $loggedInEngineer)->where('status', 'complete')->get()->count();
        // $recentAssignedTasks = Appiontment::where('engineer_id', $loggedInEngineer)->where('status', 'assigned')->get()->count();
        // $workingTasks = Appiontment::where('engineer_id', $loggedInEngineer)->where('status', 'working')->get()->count();
        // return view('engineer.dashboard', compact('totalTasks', 'totalLateTasks', 'totalCompletedTasks', 'recentAssignedTasks', 'workingTasks'));
        return view('customer.dashboard', compact('servicingProducts'));
    }

}
