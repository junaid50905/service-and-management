<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Branch;
use App\Models\Admin\Product;
use App\Models\Admin\SoldProduct;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SellingProductController extends Controller
{
    // index
    public function index()
    {
        $sellingProducts = SoldProduct::all();
        return view('admin.sold_product.index', compact('sellingProducts'));
    }

    // create
    public function create()
    {
        $products = Product::all();
        return view('admin.sold_product.create', compact('products'));
    }

    // store
    public function store(Request $request)
    {
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
        SoldProduct::create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'selling_date' => $request->selling_date,
            'warranty_end_date' => $warranty_end_date,
            'sam' => $request->sam,
            'quantity' => $request->quantity,
        ]);
        return redirect()->route('sold_product.index', compact('warranty_end_date'))->with('selling_product_create', 'Selling product added successfully');

    }

    // edit
    public function edit($id)
    {
        $selling_product = SoldProduct::find($id);
        $products = Product::all();
        return view('admin.sold_product.edit', compact('selling_product', 'products'));
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
        SoldProduct::where('id', $id)->update([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'selling_date' => $request->selling_date,
            'warranty_end_date' =>$warranty_end_date,
            'sam' => $request->sam,
            'quantity' => $request->quantity,
        ]);
        // SellingProduct::where('id', $id)->update($sellingProduct);
        return redirect()->route('sold_product.index')->with('selling_product_update', 'Selling Product information has been updated');
    }

     // delete
     public function delete($id)
     {
        SoldProduct::destroy($id);
         return redirect()->route('sold_product.index')->with('selling_product_delete', 'Customer has been deleted');
     }







     // solo index
     public function soloIndex()
     {
        $solo_users = User::where('usertype', 'solo')->orderby('id', 'desc')->get();
        return view('admin.sold_product.solo_index', compact('solo_users'));
     }
     // viewSoloProduct
     public function viewSoloProduct($id)
     {
        $products = SoldProduct::where('user_id', $id)->latest()->get();
        return view('admin.sold_product.view_solo_products', compact('products'));
     }


    // grooup index
    public function groupIndex()
    {
        $group_users = User::where('usertype', 'group')->get();
        return view('admin.sold_product.group_index', compact('group_users'));
    }
    // viewGroupProduct
    public function viewGroupProduct($id)
    {
        $products = SoldProduct::where('user_id', $id)->get();
        return view('admin.sold_product.view_group_products', compact('products'));
    }
    // viewBranchGroup
    public function viewBranchGroup($id)
    {
        $customer_id = $id;
        $branches = Branch::where('user_id', $customer_id)->get();
        return view('admin.sold_product.view_group_branches', compact('branches', 'customer_id'));
    }
    // viewGroupBranchProducts
    public function viewGroupBranchProducts($customer_id, $branch_id)
    {
        $products = SoldProduct::where('user_id', $customer_id)->where('branch_id', $branch_id)->get();
        return view('admin.sold_product.view_group_branch_products', compact('products'));
    }
}
