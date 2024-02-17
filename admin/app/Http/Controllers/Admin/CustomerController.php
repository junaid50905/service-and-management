<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\Subcategory;
use App\Http\Controllers\Controller;
use App\Models\Admin\Branch;
use App\Models\Admin\CompanyBranch;
use App\Models\Admin\Product;
use App\Models\Admin\SoldProduct;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        $customers = User::orderby('id', 'desc')->get();
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
         User::where('id', $id)->update([
            'usertype' => $request->usertype,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
         ]);
         return redirect()->route('customer.index')->with('customer_update', 'Customer information has been updated');
     }

     // delete
    public function delete($id)
    {
        User::destroy($id);
        return redirect()->route('customer.index')->with('customer_delete', 'Customer has been deleted');
    }
    // view
    public function show($id)
    {
        $customer = User::where('id', $id)->first();
        return view('admin.customer.view', compact('customer'));
    }
    // saleToSoloCustomerForm
    public function saleToSoloCustomerForm($id)
    {
        $user_id = $id;
        $categories = Category::all();
        return view('admin.customer.sale_to_solo_customer', compact('categories', 'user_id'));
    }
    // saleToSoloCustomerStore
    public function saleToSoloCustomerStore(Request $request)
    {
        SoldProduct::create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'selling_date' => $request->selling_date,
            'time_of_warranty' => $request->time_of_warranty,
            'sam' => $request->sam,
        ]);

        return redirect()->route('solo_sold_product.index')->with('sold_product', "sold a product");

    }
    // saleToGroupCustomerForm
    public function saleToGroupCustomerForm($id)
    {
        $user_id = $id;
        $categories = Category::all();
        return view('admin.customer.sale_to_group_customer', compact('user_id', 'categories'));
    }
    // saleToGroupCustomerStore
    public function saleToGroupCustomerStore(Request $request)
    {

        if(Branch::where('user_id', $request->user_id)->where('branch_name', $request->branch_name)->exists()){
            $branch_id = Branch::where('user_id', $request->user_id)->where('branch_name', $request->branch_name)->first()->id;
            SoldProduct::create([
                'user_id' => $request->user_id,
                'product_id' => $request->product_id,
                'branch_id' => $branch_id,
                'quantity' => $request->quantity,
                'selling_date' => $request->selling_date,
                'time_of_warranty' => $request->time_of_warranty,
                'sam' => $request->sam,
            ]);
        }else{
            $branch_id = Branch::insertGetId([
                'user_id' => $request->user_id,
                'branch_name' => $request->branch_name,
                'branch_address' => $request->branch_address,
                'admin_name' => $request->admin_name,
                'admin_email' => $request->admin_email,
                'admin_phone' => $request->admin_phone,
            ]);
            SoldProduct::create([
                'user_id' => $request->user_id,
                'product_id' => $request->product_id,
                'branch_id' => $branch_id,
                'quantity' => $request->quantity,
                'selling_date' => $request->selling_date,
                'time_of_warranty' => $request->time_of_warranty,
                'sam' => $request->sam,
            ]);
        }


        return redirect()->route('group_sold_product.index')->with('sold_product', "sold a product");

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
    // getProduct
    public function getProduct($subcategory_id)
    {
        $html = '';
        $products = Product::where('subcategory_id', $subcategory_id)->get();

        $html .= '<option selected>Select product</option>';
        foreach ($products as $product) {
            $html .= '<option value="' . $product->id . '">' . $product->name . '</option>';
        }
        return response()->json($html);
    }




    // getBranches
    public function getBranches(Request $request, $user_id)
    {
        if($request->ajax()){
            $data = Branch::where('user_id', $user_id)->where('branch_name', 'LIKE', $request->name.'%')->get();
            $output = '';
            if(count($data) > 0){
                $output .= '<ul class="list-group" style="display:block; position:relative; z-index:1">';
                foreach ($data as $row) {
                    // $output .= '<li class="list-group-item" value="'.$row->id.'">'.$row->branch_name.'</li>';
                    $output .= '<li class="list-group-item" aria-branch-id="'.$row->id.'" aria-branch-address="'.$row->branch_address. '" aria-admin-name="' . $row->admin_name . '" aria-admin-email="' . $row->admin_email . '" aria-admin-phone="' . $row->admin_phone . '">'.$row->branch_name.'</li>';
                }
                $output .= '</ul>';
            }else{
                $output .= '<span class="text-danger">No branch found</span>';
            }
            return response()->json($output);
        }
        return view('admin.customer.sale_to_group_customer');
    }








}
