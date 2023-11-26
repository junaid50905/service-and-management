<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Admin\SoldProduct;
use App\Models\Customer\RequestService;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // purchasedProducts
    public function purchasedProducts()
    {
        if (session()->has('loginId')) {
            $loggedInCustomer = session()->get('loginId');
        }
        $products = SoldProduct::where('user_id', $loggedInCustomer)->latest()->get();

        return view('customer.purchased_products.index', compact('products'));
    }
    // adminContact
    public function adminContact()
    {
        return view('customer.admin_contact.contact');
    }
    // requestService
    public function requestService($soldProductId)
    {
        $soldProduct = SoldProduct::where('id', $soldProductId)->first();
        $customerId = $soldProduct->user_id;
        $customer = User::where('id', $customerId)->first();
        $userType = $customer->usertype;
        
        if ($userType == 'solo') {
            RequestService::create([
                'user_id' => $customerId,
                'sold_product_id' => $soldProductId,
                'usertype' => $userType,
            ]);
            return redirect()->back()->with('request_success', 'Your request has been sent successfully');
        }
    }
    // purchasedProducts
    public function allServiceRequests()
    {
        if (session()->has('loginId')) {
            $loggedInCustomer = session()->get('loginId');
        }
        $serviceRequestProducts = RequestService::where('user_id', $loggedInCustomer)->latest()->get();

        return view('customer.service_request.index', compact('serviceRequestProducts'));
    }
}
