<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // create
    public function create()
    {
        return view('admin.customer.create');
    }

    // store
    public function store(Request $request)
    {
        $request->validate([
            'usertype' => 'required',
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'address' => 'required',
            'password' => 'required',
        ]);
        User::create($request->all());
        return redirect()->route('customer.index')->with('customer_create', 'Customer added successfully');

    }

    // index
    public function index()
    {
        $customers = User::all();
        return view('admin.customer.index', compact('customers'));
    }

    // edit
    public function edit($id)
    {
        $customer = User::find($id);
        return view('admin.customer.edit', compact('customer'));
    }

     // update
     public function update(Request $request, $id)
     {
         $request->validate([
            'usertype' => 'required',
             'name' => 'required',
             'email' => 'required',
             'phone' => 'required',
             'address' => 'required',
             'password' => 'required',
         ]);
         $updated_customer = $request->except('_token');
         User::where('id', $id)->update($updated_customer);
         return redirect()->route('customer.index')->with('customer_update', 'Customer information has been updated');
     }

     // delete
    public function delete($id)
    {
        User::destroy($id);
        return redirect()->route('customer.index')->with('customer_delete', 'Customer has been deleted');
    }

}
