<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    // allProducts
    public function allProducts()
    {
        $products = Product::all();
        return response()->json($products);
    }
}
