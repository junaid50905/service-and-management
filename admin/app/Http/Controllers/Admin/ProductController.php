<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // create
    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.product.create', compact('categories', 'subcategories'));
    }
    // store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'model' => 'required|unique:products,model',
            'price' => 'required',
        ]);
        Product::create($request->all());
        return redirect()->route('product.index')->with('product_create', 'Added new product');
    }
    // index
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }
    // delete
    public function delete($id)
    {
        Product::destroy($id);
        return redirect()->route('product.index')->with('product_delete', 'Product has been deleted');
    }
    // edit
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.product.edit', compact('product', 'categories', 'subcategories'));
    }
    // update
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'model' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
        ]);
        $updated_product = $request->except('_token');
        Product::where('id', $id)->update($updated_product);
        return redirect()->route('product.index')->with('product_update', 'Updated product information');
    }
}
