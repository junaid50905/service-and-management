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
        return view('admin.product.create', compact('categories'));
    }
    // store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'model' => 'required|unique:products,model',
            'price' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
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
        $category_id = Product::where('id', $id)->first()->category_id;
        $subcategories = Subcategory::where('category_id', $category_id)->get();
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

}
