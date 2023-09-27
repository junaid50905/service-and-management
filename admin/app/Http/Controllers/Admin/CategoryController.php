<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // create
    public function create()
    {
        return view('admin.category.create');
    }
    // store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name'
        ]);
        Category::create($request->all());
        return redirect()->route('category.index')->with('category_create', 'Category added successfully');

    }
    // index
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }
    // delete
    public function delete($id)
    {
        Category::destroy($id);
        return redirect()->route('category.index')->with('category_delete', 'Category has been deleted');
    }
    // edit
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }
    // update
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'unique:categories,name'
        ]);
        $updated_category = $request->except('_token');
        Category::where('id', $id)->update($updated_category);
        return redirect()->route('category.index')->with('category_update', 'Category information has been updated');
    }
}
