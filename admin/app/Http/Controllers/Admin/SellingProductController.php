<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\SellingProduct;
use Illuminate\Http\Request;

class SellingProductController extends Controller
{
    // index
    public function index()
    {
        $sellingProducts = SellingProduct::all();
        return view('admin.selling_product.index', compact('sellingProducts'));
    }
}
