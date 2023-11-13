<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplianceController extends Controller
{
    // create
    public function create()
    {
        $categories = Category::all();
        return view('admin.appliance.create', compact('categories'));
    }
    // store
    public function store(Request $request)
    {
        DB::table('appliances')->insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_id' => $request->product_id,
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
        $category_id = DB::table('appliances')->where('id', $id)->first()->category_id;
        $subcategories = Subcategory::where('category_id', $category_id)->get();
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


    ////////// dependancy dropdown /////////////
    public function getSubcategory($category_id)
    {
        $html = '';
        $subcategories = Subcategory::where('category_id', $category_id)->get();

        $html .= '<option selected>Select subcategory</option>';
        foreach ($subcategories as $subcategory) {
            $html .= '<option value="' . $subcategory->id . '">' . $subcategory->name . '</option>';
        }
        return response()->json($html);
    }

    // getProduct
    public function getProduct($category_id, $subcategory_id)
    {
        $html = '';
        $products = Product::where('category_id', $category_id)->where('subcategory_id', $subcategory_id)->get();

        $html .= '<option selected>Select Product</option>';
        foreach ($products as $product) {
            $html .= '<option value="' . $product->id . '">' . $product->name . '</option>';
        }
        return response()->json($html);
    }


}
