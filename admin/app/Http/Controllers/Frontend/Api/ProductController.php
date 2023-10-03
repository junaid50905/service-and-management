<?php

namespace App\Http\Controllers\Frontend\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // index
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }
}
