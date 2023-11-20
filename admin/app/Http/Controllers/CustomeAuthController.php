<?php

namespace App\Http\Controllers;

use App\Models\Admin\Admin;
use App\Models\Admin\Engineer;
use App\Models\User;
use Illuminate\Http\Request;

class CustomeAuthController extends Controller
{
    // redirectToLogin
    public function redirectToLogin()
    {
        return redirect()->route('login');
    }
    // loginForm
    public function loginForm()
    {
        return view('signin');
    }
    // loginStore
    public function loginStore(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($request->type == 'superadmin' || $request->type == 'admin') {
            $admin_panel_user = Admin::where('email', $request->email)->where('password', $request->password)->first();
            if ($admin_panel_user) {
                $request->session()->put('loginId', $admin_panel_user->id);
                return redirect()->route('admin.dashboard')->with('login_success', 'Successfully login');
            } else {
                return redirect()->back()->with('invalidCredential', "Invalid Credential");
            }
        } elseif ($request->type == 'engineer') {
            $engineer = Engineer::where('email', $request->email)->where('password', $request->password)->first();
            if ($engineer) {
                $request->session()->put('loginId', $engineer->id);
                return redirect()->route('engineer.dashboard')->with('login_success', 'Successfully login');
            } else {
                return redirect()->back()->with('invalidCredential', "Invalid Credential");
            }
        }
    }
    // logout
    public function logout()
    {
        if(session()->has('loginId')){
            session()->pull('loginId');
            return redirect()->route('login')->with('logout_success', "Successfully Logout");
        }
    }
}
