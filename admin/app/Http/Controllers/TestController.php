<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class TestController extends Controller
{
    public function create()
    {
        return view('admin.test_form');
    }
    
    public function store(Request $request)
    {
        dd($request->first_name);
        // Decrypt the encrypted form data using Laravel's Crypt facade
        // $decryptedFirstName = CryptoJs.AES.decrypt($request->input(first_name), '{{ config('app.key') }}').toString(CryptoJs.enc.Utf8);
        // dd($decryptedFirstName);

        // // Other form data
        // $lastName = $request->input('last_name');

        // // Process the decrypted form data as needed
        // // ...

        // // Redirect or return a response
        // return redirect()->route('some.route');

    }
}
