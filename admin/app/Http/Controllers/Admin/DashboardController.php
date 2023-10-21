<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use App\Models\Admin\SellingProduct;
use App\Models\Admin\SoldProduct;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // dashboard
    public function dashboard()
    {
        $totalProducts = Product::all()->count();
        $totalSalesProducts = SoldProduct::all()->count();
        return view('admin.dashboard', compact('totalProducts', 'totalSalesProducts'));
    }
}
