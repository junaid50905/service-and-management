<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplianceController extends Controller
{
    // create
    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.appliance.create', compact('categories', 'subcategories'));
    }
    // store
    public function store(Request $request)
    {
        DB::table('appliances')->insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'name' => $request->name,
            'purchase_price' => $request->purchase_price,
            'market_price' => $request->market_price,
        ]);
        return redirect()->route('appliance.index')->with('appliance_create', "Added new appliance");
    }
    // index
    public function index()
    {
        $appliances = DB::table('appliances')->get();
        return view('admin.appliance.index', compact('appliances'));
    }
    // delete
    public function delete($id)
    {
        DB::table('appliances')->where('id', $id)->delete();
        return redirect()->route('appliance.index')->with('appliance_delete', "An appliance has been deleted");
    }
    // edit
    public function edit($id)
    {
        $appliance = DB::table('appliances')->where('id', $id)->first();
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.appliance.edit', compact('appliance', 'categories', 'subcategories'));
    }
    // update
    public function update(Request $request, $id)
    {
        DB::table('appliances')->where('id', $id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'name' => $request->name,
            'purchase_price' => $request->purchase_price,
            'market_price' => $request->market_price,
        ]);
        return redirect()->route('appliance.index')->with('appliance_update', "Appliance information has been updated");
    }
}
