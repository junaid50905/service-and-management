<?php
namespace App\Http\Controllers;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Test;


class TestController extends Controller
{
    public function create()
    {
        return view('admin.test_form');
    }
    public function store(Request $request)
    {
        $encryptedFirstName = $request->input('first_name');
        $decryptedFirstName = base64_decode($encryptedFirstName);
        $test = new Test();
        $test->first_name = $decryptedFirstName;
        $test->save();
    }
}



