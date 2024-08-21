<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\OtherPageItem;

class LoginController extends Controller
{
    public function index()
    {
        $other_page = OtherPageItem::where('id', 1)->first();
        return view('frontend.login', compact('other_page'));
    }

    public function company_login_post(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);


        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::guard('company')->attempt($credentials)) {
            // dd($credentials);
            return redirect()->route('company_dashboard')->with('info', 'Welcome back ');
        } else {
            return redirect()->route('login')->with('error', 'Invalid Email or password');
        }
    }

    public function company_logout()
    {
        Auth::guard('company')->logout();
        return redirect()->route('login')->with('success', ':) Bye. Login again when you are ready');
    }
}
