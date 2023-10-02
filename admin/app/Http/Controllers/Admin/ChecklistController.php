<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Checklist;
use App\Models\User;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    // create
    public function create()
    {
        return view('admin.checklist.create');
    }
    // store
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'complain' => 'required',
        ]);
        $userId = $request->user_id;
        $hasUser = User::where('id', $userId)->first();
        if($hasUser){
            Checklist::create($request->all());
            return redirect()->route('checklist.index')->with('checklist_create', 'Checklist added successfully');
        }else{
            return redirect()->route('checklist.create')->with('unavailable_user', "Unavailable user");
        }
    }
    // index
    public function index()
    {
        $checklists = Checklist::all();
        return view('admin.checklist.index', compact('checklists'));
    }
    // delete
    public function delete($id)
    {
        Checklist::destroy($id);
        return redirect()->route('checklist.index')->with('checklist_delete', 'Checklist has been deleted');
    }
    // edit
    public function edit($id)
    {
        $checklist = Checklist::find($id);
        return view('admin.checklist.edit', compact('checklist'));
    }
    // update
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'complain' => 'required',
        ]);
        $userId = $request->user_id;
        $hasUser = User::where('id', $userId)->first();
        if ($hasUser) {
            $updated_checklist = $request->except('_token');
            Checklist::where('id', $id)->update($updated_checklist);
            return redirect()->route('checklist.index')->with('checklist_update', 'Checklist updated successfully');
        } else {
            return redirect()->route('checklist.create')->with('unavailable_user', "Unavailable user");
        }
    }
}
