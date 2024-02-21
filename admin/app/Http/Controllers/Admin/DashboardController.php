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
        $allTodaysWorkingTasks = Inspection::where('start_date', Carbon::today())->where('inspection', 'start')->get();
        $totalNumberOfTodaysWorkingTask = Inspection::where('start_date', Carbon::today())->where('inspection', 'start')->get()->count();
        $allTodaysAppiontments = Appiontment::where('appiontment_taken_date', Carbon::today())->get();


        ////////////////// report ////////////////
        $year_month = Appiontment::selectRaw('DATE_FORMAT(created_at, "%Y-%m") AS formatted_date')
            ->distinct()
            ->get()
            ->pluck('formatted_date');

        $formatted_dates = Appiontment::selectRaw('DATE_FORMAT(created_at, "%Y-%m") AS formatted_date')
        ->distinct()
        ->get()
        ->pluck('formatted_date');

        // appiontments ///////////
        $appiontments = [];
        foreach ($formatted_dates as $formatted_date) {
            // Count the number of rows for each formatted date
            $count = Appiontment::whereRaw('DATE_FORMAT(created_at, "%Y-%m") = ?', [$formatted_date])
            ->count();
            $appiontments[] = $count;
        }

        // completed rows //////////
        $completedTasks = [];
        foreach ($formatted_dates as $formatted_date) {
            $completedTask = Appiontment::whereRaw('DATE_FORMAT(created_at, "%Y-%m") = ?', [$formatted_date])
            ->where('status', 'complete')
            ->count();

            // Store the count in the array
            $completedTasks[] = $completedTask;
        }

        // late rows //////////
        $lateTasks = [];
        foreach ($formatted_dates as $formatted_date) {
            $lateTask = Appiontment::whereRaw('DATE_FORMAT(created_at, "%Y-%m") = ?', [$formatted_date])
                ->where('status', 'late')
                ->count();

            $lateTasks[] = $lateTask;
        }

        // working rows //////////
        $workingTasks = [];
        foreach ($formatted_dates as $formatted_date) {
            $workingTask = Appiontment::whereRaw('DATE_FORMAT(created_at, "%Y-%m") = ?', [$formatted_date])
                ->where('status', 'working')
                ->count();

            $workingTasks[] = $workingTask;
        }





        return view('admin.dashboard', compact('totalProducts', 'totalSalesProducts', 'recentsAppiontments', 'allTodaysWorkingTasks', 'totalNumberOfTodaysWorkingTask', 'allTodaysAppiontments', 'year_month', 'appiontments', 'completedTasks', 'lateTasks', 'workingTasks'));

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
