<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Appiontment;
use App\Models\Admin\Checklist;
use App\Models\Admin\Product;
use App\Models\Admin\ServicingOrder;
use App\Models\Admin\SoldProduct;
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

        $appiontment_id = $request->appiontment_id;
        $hasAppiontment = Appiontment::where('id', $appiontment_id)->first();

        if ($hasAppiontment) {
            $appliance_names = $request->appliance_name;
            $appliance_prices = $request->appliance_price;


            $checklistData = [];

            // Ensure both arrays have the same number of elements
            if (count($appliance_names) === count($appliance_prices)) {
                for ($i = 0; $i < count($appliance_names); $i++) {
                    $checklistData[] = [
                        'appiontment_id' => $appiontment_id,
                        'appliance_name' => $appliance_names[$i],
                        'appliance_price' => $appliance_prices[$i],
                    ];
                }
                // Create multiple Checklist records in a single query
                Checklist::insert($checklistData);
            }

            ServicingOrder::create([
                'appiontment_id' => $appiontment_id
            ]);

            return redirect()->route('checklist.index')->with('checklist_create', 'Checklist added successfully');
        } else {
            return redirect()->route('checklist.create')->with('unavailable_appiontment', "Unavailable appiontment");
        }
    }
    // index
    public function index()
    {
        $servicing_orders = ServicingOrder::all();
        return view('admin.checklist.index', compact('servicing_orders'));
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
    // view
    public function view($id)
    {
        $servicing_order_id = $id;
        $appiontment_id = ServicingOrder::where('id', $id)->first()->appiontment_id;
        $selling_product_id = Appiontment::where('id', $appiontment_id)->first()->selling_product_id;
        $product_id = SoldProduct::where('id', $selling_product_id)->first()->product_id;
        $product_name = Product::where('id', $product_id)->first()->name;
        $user_id = SoldProduct::where('id', $selling_product_id)->first()->user_id;
        $user_name = User::where('id', $user_id)->first()->name;
        $user_email = User::where('id', $user_id)->first()->email;
        $user_phone = User::where('id', $user_id)->first()->phone;

        $appliances = Checklist::where('appiontment_id', $appiontment_id)->get();

        return view('admin.checklist.view', compact('servicing_order_id', 'appiontment_id', 'selling_product_id', 'product_id', 'product_name', 'user_id', 'user_name', 'user_email', 'user_phone', 'appliances'));
        dd($id);
    }
}
