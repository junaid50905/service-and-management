<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Appiontment;
use App\Models\Admin\Category;
use App\Models\Admin\Engineer;
use App\Models\Admin\Subcategory;
use App\Models\Engineer\Inspection;
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
        $engineers = Engineer::latest()->get();;
        return view('admin.engineer.index', compact('engineers'));
    }

    // view
    public function view($id)
    {
        $engineer = Engineer::where('id', $id)->first();
        return view('admin.engineer.view', compact('engineer'));
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
    // getSubcategory
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
    // getEngineerBlockSlot
    public function getEngineerBlockSlot($engineer_id)
    {
        $html = '';
        $data = Appiontment::where('engineer_id', $engineer_id)->whereNot('status', 'pending')->whereNot('status', 'complete')->get();
        foreach ($data as $item) {

            $html .=
            '<div class="col-md-3 m-1 p-2 border">'.'<div class="item">'. $item->inspection_date .'<br>' . $item->inspection_time. '<br>' .'<span class="badge">'. $item->status.'</span>'.'</div>'.'</div>';
        }
        return response()->json($html);
    }
}
