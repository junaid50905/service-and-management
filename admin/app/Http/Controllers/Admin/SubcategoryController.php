<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\Subcategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Admin\CatagorySubcategory;

class SubcategoryController extends Controller
{
    // create
    public function create()
    {
        $categories = Category::all();
        return view('admin.subcategory.create', compact('categories'));
    }
    // store
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required|unique:subcategories,name'
        ]);
        Subcategory::create($request->all());
        
        return redirect()->route('subcategory.index')->with('subcategory_create', 'Subcategory added successfully');
    }
    // index
    public function index()
    {
        $subcategories = Subcategory::all();
        return view('admin.subcategory.index', compact('subcategories'));
    }
    // delete
    public function delete($id)
    {
        Subcategory::destroy($id);
        return redirect()->route('subcategory.index')->with('subcategory_delete', 'Subcategory has been deleted');
    }
    // edit
    public function edit($id)
    {
        $subcategory = Subcategory::where('id', $id)->first();
        $categories = Category::all();
        return view('admin.subcategory.edit', compact('subcategory', 'categories'));
    }
    // update
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required|unique:subcategories,name'
        ]);
        $updated_subcategory = $request->except('_token');
        Subcategory::where('id', $id)->update($updated_subcategory);
        return redirect()->route('subcategory.index')->with('subcategory_update', 'Subcategory information has been updated');
    }
}
