<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use App\Models\Admin\SellingProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SellingProductController extends Controller
{
    // index
    public function index()
    {
        $sellingProducts = SellingProduct::all();
        return view('admin.selling_product.index', compact('sellingProducts'));
    }

    // create
    public function create()
    {
        $products = Product::all();
        return view('admin.selling_product.create', compact('products'));
    }

    // store
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'user_id' => 'required',
            'product_id' => 'required',
            'selling_date' => 'required',
            'sam' => 'required',
            'quantity' => 'required',
        ]);
        $product_id = $request->product_id;
        $time_of_warranty = Product::where('id', $product_id)->first()->time_of_warranty;
        $selling_date = Carbon::parse($request->selling_date);
        $warranty_end_date = $selling_date->addMonths($time_of_warranty);
        SellingProduct::create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'selling_date' => $request->selling_date,
            'warranty_end_date' => $warranty_end_date,
            'sam' => $request->sam,
            'quantity' => $request->quantity,
        ]);
        return redirect()->route('selling_product.index', compact('warranty_end_date'))->with('selling_product_create', 'Selling product added successfully');

    }

    // edit
    public function edit($id)
    {
        $selling_product = SellingProduct::find($id);
        $products = Product::all();
        return view('admin.selling_product.edit', compact('selling_product', 'products'));
    }

    // update
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'product_id' => 'required',
            'selling_date' => 'required',
            'sam' => 'required',
            'quantity' => 'required',
        ]);
        // $sellingProduct = $request->except('_token');
        $product_id = $request->product_id;
        $time_of_warranty = Product::where('id', $product_id)->first()->time_of_warranty;
        $selling_date = Carbon::parse($request->selling_date);
        $warranty_end_date = $selling_date->addMonths($time_of_warranty);
        SellingProduct::where('id', $id)->update([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'selling_date' => $request->selling_date,
            'warranty_end_date' =>$warranty_end_date,
            'sam' => $request->sam,
            'quantity' => $request->quantity,
        ]);
        // SellingProduct::where('id', $id)->update($sellingProduct);
        return redirect()->route('selling_product.index')->with('selling_product_update', 'Selling Product information has been updated');
    }

     // delete
     public function delete($id)
     {
         SellingProduct::destroy($id);
         return redirect()->route('selling_product.index')->with('selling_product_delete', 'Customer has been deleted');
     }
}
