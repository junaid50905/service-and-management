<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Engineer;
use Illuminate\Http\Request;

class EngineerController extends Controller
{
    // create
    public function create()
    {
        return view('admin.engineer.create');
    }

    // store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
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
        return view('admin.engineer.edit', compact('engineer'));
    }

    // update
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
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
}
