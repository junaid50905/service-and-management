<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // create
    public function create()
    {
        return view('admin.admins.create');
    }

    // store
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'name' => 'required',
            'email' => 'required|unique:admins,email',
            'password' => 'required',
        ]);
        Admin::create($request->all());
        return redirect()->route('admin.index')->with('create_admin', "New admin added");
    }

    // index
    public function index()
    {
        $admins = Admin::latest()->get();
        return view('admin.admins.index', compact('admins'));
    }

    // view
    public function view($id)
    {

    }

    // edit
    public function edit($id)
    {
        $admin = Admin::where('id', $id)->first();
        return view('admin.admins.edit', compact('admin'));
    }

    // update
    public function update(Request $request, $id)
    {
        Admin::where('id', $id)->update([
            'type' => $request->type,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return redirect()->route('admin.index')->with('udpate_admin', "Update admin information");
    }

    // delete
    public function delete($id)
    {
        Admin::destroy($id);
        return redirect()->route('admin.index')->with('admin_delete', 'Admin has been deleted');
    }
}
