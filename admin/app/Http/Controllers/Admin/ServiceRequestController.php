<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin\Appiontment;
use App\Models\Admin\SoldProduct;
use App\Http\Controllers\Controller;
use App\Models\Customer\RequestService;

class ServiceRequestController extends Controller
{
    // allSoloRequest
    public function allSoloRequest()
    {
        $allServiceRequest = RequestService::where('usertype', 'solo')->latest()->get();
        return view('admin.service_request.all_solo_request', compact('allServiceRequest'));
    }
    // appiontmentFormSoloCustomer
    public function takeAppiontment($soldProductId, $serviceRequestId)
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

        RequestService::where('id', $serviceRequestId)->update([
            'status' => 'taken',
        ]);

        if ($userType == 'solo') {
            return redirect()->route('appiontment.solo_index')->with('appiontment_taken', "One appiontment has been taken");
        } else {
            return redirect()->route('appiontment.group_index')->with('appiontment_taken', "One appiontment has been taken");
        }
    }
}
