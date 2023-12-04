<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Appiontment;
use App\Models\Admin\Engineer;
use App\Models\Admin\Product;
use App\Models\Admin\SoldProduct;
use App\Models\Engineer\Inspection;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    // dashboard
    public function dashboard()
    {
        $totalProducts = Product::all()->count();
        $totalSalesProducts = SoldProduct::all()->count();
        $recentsAppiontments = Appiontment::latest()->limit(5)->get();
        $allTodaysWorkingTasks = Inspection::where('start_date', Carbon::today())->where('status', 'working')->take(2)->get();
        $totalNumberOfTodaysWorkingTask = Inspection::where('start_date', Carbon::today())->where('status', 'working')->get()->count();

        return view('admin.dashboard', compact('totalProducts', 'totalSalesProducts', 'recentsAppiontments', 'allTodaysWorkingTasks', 'totalNumberOfTodaysWorkingTask'));
    }
    // allTodaysTasks
    public function allTodaysWorkingTasks()
    {
        $allTasks = Inspection::where('start_date', Carbon::today())->where('status', 'working')->get();
        return view('admin.todays_working_tasks.index', compact('allTasks'));
    }

    // getEngineersLocationInOneMap
    public function getEngineersLocationInOneMap($engineerId, $appiontmentId)
    {
        $engineer = Engineer::where('id', $engineerId)->first();
        $appiontment = Appiontment::where('id', $appiontmentId)->first();

        return response()->json([
            'engineer' => $engineer,
            'appiontment' => $appiontment,
        ]);
    }
}
