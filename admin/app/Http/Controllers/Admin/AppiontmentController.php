<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Engineer;
use App\Models\Admin\Appiontment;
use App\Models\Admin\SoldProduct;
use App\Models\Engineer\Inspection;
use App\Http\Controllers\Controller;
use App\Models\Admin\RecruitingEngineer;
use App\Models\Engineer\PartsForProduct;
use Illuminate\Support\Facades\Validator;


class AppiontmentController extends Controller
{
    // groupIndex
    public function groupIndex()
    {
        $allAppiontments = Appiontment::where('usertype', 'group')->latest()->get();
        // foreach ($allAppiontments as $appiontment) {
        //     $status = $appiontment->status;
        //     $inspection_date = $appiontment->inspection_date;
        //     $inspection_time = $appiontment->inspection_time;
        //     $inspection_datetime = Carbon::parse($inspection_date . ' ' . $inspection_time);

        //     if($status == 'assigned'){
        //         if ($inspection_datetime < Carbon::now()) {
        //             $appiontment->update([
        //                 'status' => 'late',
        //             ]);
        //         }
        //     }
        // }
        return view('admin.appiontment.group_index', compact('allAppiontments'));
    }
    // soloIndex
    public function soloIndex()
    {
        $allAppiontments = Appiontment::where('usertype', 'solo')->latest()->get();
        // foreach ($allAppiontments as $appiontment) {
        //     $status = $appiontment->status;
        //     $inspection_date = $appiontment->inspection_date;
        //     $inspection_time = $appiontment->inspection_time;
        //     $inspection_datetime = Carbon::parse($inspection_date . ' ' . $inspection_time);

        //     if ($status == 'assigned') {
        //         if ($inspection_datetime < Carbon::now()) {
        //             $appiontment->update([
        //                 'status' => 'late',
        //             ]);
        //         }
        //     }
        // }
        return view('admin.appiontment.solo_index', compact('allAppiontments'));
    }
    // appiontmentStore
    public function appiontmentStore(Request $request)
    {
        $soldProductId = $request->sold_product_id;
        $userId = SoldProduct::where('id', $soldProductId)->first()->user_id;
        $userType = User::where('id', $userId)->first()->usertype;
        $currentDateTime = Carbon::now();

        Appiontment::create([
            'sold_product_id' => $soldProductId,
            'usertype' => $userType,
            'appiontment_taken_date' => $currentDateTime->toDateString(),
            'appiontment_taken_time' => $currentDateTime->toTimeString(),
        ]);
        return redirect()->route('appiontment.group_index')->with('appiontment_taken', "One appiontment has been taken");
    }
    // assignEngineer
    public function assignEngineer($id)
    {
        $appiontmentId = $id;
        $sold_product_id = Appiontment::where('id', $appiontmentId)->first()->sold_product_id;
        $product_id = SoldProduct::where('id', $sold_product_id)->first()->product_id;
        $category_id = Product::where('id', $product_id)->first()->category_id;
        $subcategory_id = Product::where('id', $product_id)->first()->subcategory_id;
        $engineers = Engineer::where('category_id', $category_id)->where('subcategory_id', $subcategory_id)->get();

        $appiontments = Appiontment::whereNot('status', 'complete')->whereNot('status', 'pending')->get();

        $events = array();
        $app = Appiontment::whereNot('status', 'complete')->whereNot('status', 'pending')->orderBy('inspection_date', 'desc')->get();

        foreach ($app as $value) {
            foreach ($engineers as $engineer) {
                if ($engineer->id == $value->engineer_id) {
                    $events[] = [
                        'title' => Engineer::where('id', $value->engineer_id)->first()->name,
                        'start' => $value->inspection_date . ' ' . $value->inspection_time,
                    ];
                }
            };

        }
        return view('admin.appiontment.assign_engineer_form', compact('engineers', 'appiontmentId', 'app', 'events'));
        // return view('admin.appiontment.assign_engineer_form', [
        //     'engineers' => $engineers,
        //     'appiontmentId' => $appiontmentId,
        //     'app' => $app,
        //     'events' => $events,
        // ]);
    }
    // assignEngineerStore
    public function assignEngineerStore(Request $request)
    {
        if($request->engineer_id == 'Select engineer'){
            return redirect()->back()->with('assign_engineer', "Please, assign enginner.");
        }
        $userType = Appiontment::where('id', $request->appiontment_id)->first()->usertype;
        if ($userType == 'group') {
            RecruitingEngineer::create($request->all());
            Appiontment::where('id', $request->appiontment_id)->update(
                [
                    'status' => 'assigned',
                    'inspection_date' => $request->date,
                    'inspection_time' => $request->time,
                    'engineer_id' => $request->engineer_id,
                ]
            );
            return redirect()->route('appiontment.group_index')->with('appiontment_assigned', "Appiontment assigned successfully");
        } else {
            RecruitingEngineer::create($request->all());
            Appiontment::where('id', $request->appiontment_id)->update(
                [
                    'status' => 'assigned',
                    'inspection_date' => $request->date,
                    'inspection_time' => $request->time,
                    'engineer_id' => $request->engineer_id,
                ]
            );
            return redirect()->route('appiontment.solo_index')->with('appiontment_assigned', "Appiontment assigned successfully");
        }
    }
    // assignedEngineerDetailed
    public function assignedEngineerDetailed($id)
    {
        $appiontmentId = $id;
        $engineerID = RecruitingEngineer::where('appiontment_id', $appiontmentId)->first()->engineer_id;
        $engineerDetails = Engineer::where('id', $engineerID)->first();
        return view('admin.appiontment.assigned_engineer_detailed', compact('engineerDetails'));
    }

    // appiontmentFormSoloCustomer
    public function appiontmentFormSoloCustomer($soldProductId)
    {
        $userId = SoldProduct::where('id', $soldProductId)->first()->user_id;
        $userType = User::where('id', $userId)->first()->usertype;
        $currentDateTime = Carbon::now();

        Appiontment::create([
            'sold_product_id' => $soldProductId,
            'user_id' => $userId,
            'usertype' => $userType,
            'appiontment_taken_date' => $currentDateTime->toDateString(),
            'appiontment_taken_time' => $currentDateTime->toTimeString(),
        ]);
        if ($userType == 'solo') {
            return redirect()->route('appiontment.solo_index')->with('appiontment_taken', "One appiontment has been taken");
        } else {
            return redirect()->route('appiontment.group_index')->with('appiontment_taken', "One appiontment has been taken");
        }
    }
    // checkUserProductForm
    public function checkUserProductForm($id)
    {
        $sold_product_id = $id;
        $user_id = SoldProduct::where('id', $sold_product_id)->first()->user_id;
        $usertype = User::where('id', $user_id)->first()->usertype;

        if ($usertype === 'group') {
            $product_id = SoldProduct::where('id', $sold_product_id)->first()->product_id;
            $branch_id = SoldProduct::where('id', $sold_product_id)->first()->branch_id;
            return view('admin.appiontment.check_user_product', compact('sold_product_id', 'user_id', 'product_id', 'branch_id'));
        }
    }

    // checkUserProductStore
    public function checkUserProductStore(Request $request)
    {
        $sellingProduct = SoldProduct::where('user_id', $request->user_id)->where('branch_id', $request->branch_id)->where('product_id', $request->product_id)->first();

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

    // inspectionLocation
    public function inspectionLocation($id)
    {
        $appiontment_id = $id;
        $lastInspection = Inspection::where('appiontment_id', $appiontment_id)->get()->last();
        $lat = $lastInspection->latitude;
        $lng = $lastInspection->longitude;

        return view('admin.appiontment.inspection_location', compact('lat', 'lng', 'lastInspection'));
    }
    // partsNeed
    public function partsNeed($id)
    {
        $appiontmentId = $id;
        $parts = PartsForProduct::where('appiontment_id', $id)->get();
        $appiontment = Appiontment::where('id', $id)->first();
        $soldProductId = $appiontment->sold_product_id;
        $soldProduct = SoldProduct::where('id', $soldProductId)->first();
        $sellingDate = $soldProduct->selling_date;
        $timeOfWarranty = $soldProduct->time_of_warranty;
        $sam = $soldProduct->sam;
        $warrantyEndDate = Carbon::parse($sellingDate)->addMonths($timeOfWarranty)->format('Y-m-d');
        return view('admin.appiontment.view_parts', compact('parts', 'sellingDate', 'timeOfWarranty', 'sam', 'warrantyEndDate', 'appiontmentId'));
    }
}
