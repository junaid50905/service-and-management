<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Http\Controllers\Controller;
use App\Models\Admin\Appiontment;
use App\Models\Admin\Engineer;
use App\Models\Admin\RecruitingEngineer;
use App\Models\Admin\SellingProduct;


class AppiontmentController extends Controller
{
    // index
    public function index()
    {
        $allAppiontments = Appiontment::latest()->get();
        return view('admin.appiontment.index', compact('allAppiontments'));

    }
    // assignEngineer
    public function assignEngineer($id)
    {
        $appiontmentId = $id;
        $engineers = Engineer::all();

        return view('admin.appiontment.assign_engineer_form', compact('engineers', 'appiontmentId'));
    }
    // assignEngineerStore
    public function assignEngineerStore(Request $request)
    {
        RecruitingEngineer::create($request->all());
        Appiontment::where('id', $request->appiontment_id)->update(
            [
                'status' => 'assigned',
                'date' => $request->date,
                'time' => $request->time,
            ]);
        return redirect()->route('appiontment.index')->with('appiontment_assigned', "Appiontment assigned successfully");

    }
    // assignedEngineerDetailed
    public function assignedEngineerDetailed($id)
    {
        $appiontmentId = $id;
        $engineerID = RecruitingEngineer::where('appiontment_id', $appiontmentId)->first()->engineer_id;
        $engineerDetails = Engineer::where('id', $engineerID)->first();
        return view('admin.appiontment.assigned_engineer_detailed', compact('engineerDetails'));
    }
    // checkUserProductForm
    public function checkUserProductForm()
    {
        return view('admin.appiontment.check_user_product');
    }

    // checkUserProductStore
    public function checkUserProductStore(Request $request)
    {
        $sellingProduct = SellingProduct::where('user_id', $request->user_id)->where('product_id', $request->product_id)->first();

        if ($sellingProduct) {

            $productName = Product::where('id', $sellingProduct->product_id)->first()->name;
            $selling_date = $sellingProduct->selling_date;
            $warranty_end_date = $sellingProduct->warranty_end_date;
            $sam = $sellingProduct->sam;

            // date
            $date1 = Carbon::parse($warranty_end_date);
            $date2 = Carbon::now();

            $diffInDays = $date1->diffInDays($date2);

            return view('admin.appiontment.product_details', compact('productName', 'selling_date', 'warranty_end_date', 'sam', 'diffInDays', 'sellingProduct'));
        } else {
            return redirect()->route('appiontment.check_user_product_form')->with('user_or_product_unavailable', 'This userid or productid is unavailable');
        }
    }


    // appiontmentStore
    public function appiontmentStore(Request $request)
    {
        Appiontment::create($request->all());
        return redirect()->route('appiontment.index')->with('appiontment_taken', "One appiontment has been taken");
    }


}
