<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Appiontment;
use App\Models\Admin\Product;
use App\Models\Admin\SoldProduct;

class DashboardController extends Controller
{
    // dashboard
    public function dashboard()
    {
        $totalProducts = Product::all()->count();
        $totalSalesProducts = SoldProduct::all()->count();
        $recentsAppiontments = Appiontment::latest()->limit(5)->get();
        return view('admin.dashboard', compact('totalProducts', 'totalSalesProducts', 'recentsAppiontments'));
    }
}
