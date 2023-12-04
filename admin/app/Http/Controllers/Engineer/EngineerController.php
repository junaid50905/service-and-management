<?php

namespace App\Http\Controllers\Engineer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Appiontment;
use App\Models\Admin\Branch;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\RecruitingEngineer;
use App\Models\Admin\SoldProduct;
use App\Models\Admin\Subcategory;
use App\Models\Engineer\Inspection;
use App\Models\Engineer\PartsForProduct;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class EngineerController extends Controller
{
    // total number of task
    public function totalTasks()
    {
        if (session()->has('loginId')) {
            $loggedInEngineer = session()->get('loginId');
        }
        $totalTasks = RecruitingEngineer::where('engineer_id', $loggedInEngineer)->orderBy('id', 'desc')->get();

        return view('engineer.total_tasks.index', compact('totalTasks'));
    }

    // taskView
    public function taskView($id)
    {

        $appiontment_id = $id;
        // appiontment
        $appiontment = Appiontment::where('id', $id)->first();
        $soldProductId = $appiontment->sold_product_id;
        $customerType = $appiontment->usertype;

        // sold product
        $soldProduct = SoldProduct::where('id', $soldProductId)->first();
        $customerId = $soldProduct->user_id;
        $productId = $soldProduct->product_id;
        $branchId = $soldProduct->branch_id;
        $branchExists = Branch::where('id', $branchId)->where('user_id', $customerId)->exists();

        // branch
        $branch = Branch::where('id', $branchId)->where('user_id', $customerId)->first();

        // customer
        $customer = User::where('id', $customerId)->first();

        // product
        $product = Product::where('id', $productId)->first();
        $categoryId = $product->category_id;
        $subcategoryId = $product->subcategory_id;
        $product = Product::where('id', $productId)->first();

        // category
        $category = Category::where('id', $categoryId)->first();

        // subcategory
        $subcategory = Subcategory::where('id', $subcategoryId)->where('category_id', $categoryId)->first();


        return view('engineer.total_tasks.view', compact('product', 'category', 'subcategory', 'customer', 'branchExists', 'branch', 'appiontment_id'));
    }

    // startInspection
    public function startInspection(Request $request)
    {
        if (session()->has('loginId')) {
            $loggedInEngineer = session()->get('loginId');
        }

        $start_date = Carbon::today();
        $start_time = Carbon::now()->format('H:i:s');

        $data = Inspection::insert([
            'appiontment_id' => $request->appiontment_id,
            'engineer_id' => $loggedInEngineer,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'start_date' => $start_date,
            'start_time' => $start_time,
            'status' => 'working',
            'inspection' => 'start',
        ]);

        Appiontment::where('id', $request->appiontment_id)->update([
            'status' => 'working',
        ]);

        return response()->json($data);
    }


    // stopInspection
    public function stopInspection(Request $request, $appiontment_id)
    {
        Inspection::where('appiontment_id', $appiontment_id)->update([
            'end_time' => Carbon::now()->format('H:i:s'),
            'inspection' => 'stop',
        ]);

        return redirect()->back();
    }

    // completeInspection
    public function completeTask(Request $request, $id)
    {
        Appiontment::where('id', $id)->update([
            'status' => 'complete'
        ]);
        Inspection::where('appiontment_id', $id)->update([
            'status' => 'complete'
        ]);

        return redirect()->route('engineer.total_tasks')->with('complete_task', "Thank you. You have completed a task successfully.");
    }
    // neededParts
    public function neededParts(Request $request)
    {
        $appiontment_id = $request->appiontment_id;

        $appliance_names = $request->appliance_name;
        $individualItems = explode(',', $appliance_names[0]);

        foreach ($individualItems as $appliance_name) {
            PartsForProduct::create([
                'appiontment_id' => $appiontment_id,
                'appliance_name' => $appliance_name,
            ]);
        }

        // Additional logic or redirect if needed

        return redirect()->back()->with('parts_add_success', 'Successfully added part(s)');
    }


}
