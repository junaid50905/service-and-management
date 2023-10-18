<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Engineer;
use App\Models\Admin\Subcategory;
use Illuminate\Http\Request;

class EngineerController extends Controller
{
    // create
    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.engineer.create', compact('categories', 'subcategories'));
    }

    // store
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'name' => 'required',
            'email' => 'required|unique:engineers,email',
            'password' => 'required',
            'phone' => 'required|unique:engineers,phone',
            'address' => 'required',
        ]);
        Engineer::create($request->all());
        return redirect()->route('engineer.index')->with('engineer_create', 'Engineer added successfully');

    }

    // index
    public function index()
    {
        $engineers = Engineer::all();
        return view('admin.engineer.index', compact('engineers'));
    }

    // edit
    public function edit($id)
    {
        $engineer = Engineer::find($id);
        $categories = Category::all();
        $category_id = Engineer::where('id', $id)->first()->category_id;
        $subcategories = Subcategory::where('category_id', $category_id)->get();
        return view('admin.engineer.edit', compact('engineer', 'categories', 'subcategories'));
    }

    // update
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        $updated_engineer = $request->except('_token');
        Engineer::where('id', $id)->update($updated_engineer);
        return redirect()->route('engineer.index')->with('engineer_update', 'Engineer information has been updated');
    }

    // delete
    public function delete($id)
    {
        Engineer::destroy($id);
        return redirect()->route('engineer.index')->with('engineer_delete', 'Engineer has been deleted');
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
}
